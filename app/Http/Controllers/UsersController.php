<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\BankUser;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;
use App\Mail\PaymentInstruction;
use App\Models\ChatSubscription;
use App\Models\ExpressTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Models\ExpressTransactionChat;
use Illuminate\Support\Facades\Storage;
use App\Mail\AwaitingPaymentConfirmation;
use App\Mail\AdminTransactionNotification;
use App\Events\TransactionNotificationEvent;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TransactionNotification;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function activate($req){
        $users = new User();

        $activateUser = $users->where('emailcode', $req)->update([
            'activate'  => 1,
            'email_verified_at' => Carbon::now()
        ]);

        if($activateUser){
            return redirect('users/login');
        }
    }

    public function home() {
        return view('home');
    }

    public function index(Request $request) {
        return view('back.pages.users.home');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('users.login');
    }

    public function ResetForm(Request $request, $token = null){
        $data = [
            'pageTitle' => 'Reset Password',
        ];
        return view('back.pages.seller_auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }

    public function sellOut(Request $request){
        $request->validate([
            'amount'        => 'required',
            'buying_id'     => 'required',
            'wallets'       => 'required'
        ]);
        $transactions           = md5(uniqid(time()));
        $sell = new Transaction();
        
        $sell->users_id         = auth('web')->id();
        $sell->seller_id        = $request->buying_id;
        $sell->amount           = $request->amount;
        $sell->amount_release   = $request->amount;
        $sell->selling          = $request->wallets;
        $sell->transaction_id   = $transactions;
        
        if($sell->save()){

            $notification = [
                'client_name'       => 'A client',
                'amount'            => $request->amount,
                'transaction'       => $transactions,
                'admin_policy'      => 'A fast and smooth transaction is expected. This is a yardstick for rating you',
                'time'              => '10 minutes'
            ];
            $delayed = now()->addSecond(10);
            $seller = User::find($request->buying_id);
            $seller->notify((new TransactionNotification($notification))->delay($delayed));
            event(new TransactionNotificationEvent($notification));
            
            return redirect('users/transactions/'.$transactions);
        }else{
           return back();
        }  
    }

    public function transactions(Request $request, $id){
        
        $currentTransaction = Transaction::where('transaction_id', $id)->first();
        return view('back.pages.users.transactions', [
            'transactions'  => $currentTransaction
        ]);
    }

    public function expressTransaction(Request $request)
    { 
        $orderId = Str::random(60); 
        $buyerId = '';
        $data = json_decode($request->getContent(), true);

        $user = User::where('id', auth()->user()->id)->first();
        $bank = BankUser::where('id', $data['bank'])->first();
        
        $sellerTerms= ExchangeItem::where('id', $request->wallet_id)->first();

        $buyer = User::where('type', '1')->get();

        foreach($buyer as $item){
           if($item->name == 'Femi Odeyemi'){
                $buyerId = $item->id;
                break;
           }
        }

        $sellerDetail = [
            'seller_name'   => $user->name,
        ];

        $sellerBankDetail = [
            'bank_name'     => $bank->bank_name,
            'account'       => $bank->account_number,
            'name'          => $bank->account_name
        ];
        
        $transactionId = [
            'seller'    => auth()->user()->id,
            'buyer'     => $buyerId
        ];


        $initiate = new ExpressTransaction();
        $initiate->order_id = $orderId;

        $initiate->seller_id            = $transactionId['seller'];
        $initiate->buyer_id             = $transactionId['buyer'];
        $initiate->wallet_name          = $data['wallet_name'];
        $initiate->wallet_id            = $request->wallet_id;
        $initiate->wallet_currency      = 'USD';
        $initiate->wallet_amount        = $data['amount'];
        $initiate->conversion_name      = 'NGN';
        $initiate->conversion_amount    = $data['total'];
        $initiate->seller_name          = $sellerDetail['seller_name'];
        $initiate->seller_bank_name     = $sellerBankDetail['bank_name'];
        $initiate->seller_account_name  = $sellerBankDetail['name'];
        $initiate->transaction_status   = 'processing';

        $initiate->conversion_percentage    = $data['rate'];
        $initiate->seller_account_number    = $sellerBankDetail['account'];

        $initiate->express_binding_detail_duration      = '30';
        $initiate->express_binding_detail_start_time    = Carbon::now();
        $initiate->express_binding_detail_end_time      = Carbon::now()->addMinutes(30);
        $initiate->express_binding_detail_note          = $sellerTerms->seller_note;
        
        $processTransact    = $initiate->save();

        $mailBody = $sellerTerms->seller_note;


        if($processTransact){
            $getRedirect = ExpressTransaction::where('order_id', $orderId)->first();
            $chatSub = new ChatSubscription();
            $chatSub->user_id = auth()->user()->id;
            $chatSub->session_id = $getRedirect->order_id;
            $chatSub->save();

            $notifyAdmin = User::find($buyerId);
            Mail::to($notifyAdmin)->send(new AdminTransactionNotification($user->name, $orderId, $data['amount']));
            Mail::to($user)->send(new PaymentInstruction($user->name, $mailBody, $orderId, $data['amount'],  Carbon::now()));
            return response()->json([
                'message'   => $getRedirect->order_id
            ], 200);
        }else{
            return response()->json([
                'message'  => $processTransact->getMessage()
            ], 400);
        }  
    }

    public function popPayment(Request $request){
        if($request->hasFile('image')){
            $path       =   "/images/pop_payment/";
            $file       =   $request->file('image');
            $filename   =   $file->getClientOriginalName();
            $new_filename   =   time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string)file_get_contents($file));

            $post_thumbnail_path = $path.'thumbnails';

            if( !Storage::disk('public')->exists($post_thumbnail_path)){
                Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
            }   

            Image::make( storage_path('app/public/'.$path.$new_filename))
                                ->fit(200, 200)
                                ->save( storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$new_filename));

            Image::make( storage_path('app/public/'.$path.$new_filename))
                                ->fit(500, 350)
                                ->save( storage_path('app/public/'.$path.'thumbnails/'.'resized_'.$new_filename));

            if( $upload ){
                $update = ExpressTransaction::where('order_id', $request->session)->update(['pop_path' =>  $new_filename]);


                if( $update ){
                    return response()->json([
                        'code'  => 1,
                        'msg'   => $new_filename
                    ]);
                }else{
                    return response()->json([
                        'code'  => 3,
                        'msg'   => 'Something went wrong while saving data'
                    ]);
                }
            }else{
                return response()->json([
                    'code'  => 3,
                    'msg'   => 'Something went wrong while uploading the image' 
                ]);
            }   
        }
    }

    public function popApproval(Request $request)
    {
       $updated = ExpressTransaction::where('order_id', $request->session)->update(['seller_payment_approval' => 1, 'pop_confirmation' => 1]);
       $takeOut = ExpressTransaction::where('order_id', $request->session)->first(); 

       Mail::to(Auth::user())->send(new AwaitingPaymentConfirmation($takeOut->seller_name, $request->session, $takeOut->conversion_amount, $takeOut->created_at));
       

       if($updated){
            return response()->json(['success' => 'success'], 200);
       }

    }

    public function chat(Request $request){
        $session = ChatSubscription::where('user_id', auth()->user()->id)->first();
        event(new ChatMessageEvent($request->message, Auth::user(), $request->sessionId));
    }

    public function expressTransactionMessages(Request $request){
        $request->validate([
            'user_id'       => 'required',
            'message'       => 'required',
            'session_id'    => 'required'
        ]);

        $saveChat = new ExpressTransactionChat();
        $saveChat->user_id      = $request->user_id;
        $saveChat->sender_id      = $request->sender_id;
        $saveChat->receiver_id      = $request->receiver_id;
        $saveChat->message      = $request->message;
        $saveChat->session_id   = $request->session_id;

        $saveChat->save();
    }

    public function expressTransactionMessagesHistory(Request $request){
        $request->validate([
            'session_id'    => 'required'
        ]);

        $grapChat =  ExpressTransactionChat::where('session_id', $request->session_id)->get();
        return response()->json(['message' => $grapChat], 200);

    }


    public function chatSubscription(Request $request){
        $session = ChatSubscription::where('user_id', $request->data)->first();
        return response()->json(['data' => $session->session_id], 200);
    }

    public function expressTransactionActivity(Request $request){
        if($request->message){
            $sessionId = $request->message;
        }
        return view('back.pages.users.express-transaction', ['sessionid' => $sessionId]);
    }

    public function mobileExpressTransactionActivity(Request $request){
        if($request->message){
            $sessionId = $request->message;
        }
        return view('back.pages.users.mobile-express-transaction', ['sessionid' => $sessionId]);
    }

    public function awaitingConfirmation(){
        return view('back.pages.users.express-awaiting-confirmation');
    }

    public function completeTransaction()
    {
        return view('back.pages.users.express-complete-transaction');
    }
    
    public function caluculator(Request $request){
        if($request->input('id') !== null){
            return view('back.pages.users.calculate');
        }else{
            return redirect('/users/home');
        }
       
    }
    
    public function whatsapp() {
        DB::insert('insert into whatsapp (users_id, name, initiated) values (?, ?,?)', [auth()->user()->id, auth()->user()->name, Carbon::now()]);
        return redirect('https://wa.link/xe08a5');
    }
    
    public function businessProfileCreate(Request $request){
        $check = DB::table('business_profile')->where('users_id', auth()->user()->id)->first();
        
        if($check !== null){
            if($request->hasFile('businesslogo')){
            
                $path       =   "/images/business_profile/";
                $file       =   $request->file('businesslogo');
                $filename   =   $file->getClientOriginalName();
                $new_filename   =   time().'_'.$filename;
    
                $upload = Storage::disk('public')->put($path.$new_filename, (string)file_get_contents($file));
    
                $post_thumbnail_path = $path.'thumbnails';
    
                if( !Storage::disk('public')->exists($post_thumbnail_path)){
                    Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
                }   
    
                Image::make( storage_path('app/public/'.$path.$new_filename))
                                    ->fit(200, 200)
                                    ->save( storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$new_filename));
    
                Image::make( storage_path('app/public/'.$path.$new_filename))
                                    ->fit(500, 350)
                                    ->save( storage_path('app/public/'.$path.'thumbnails/'.'resized_'.$new_filename));
    
                if( $upload ){
                     DB::table('business_profile')->where('users_id', auth()->user()->id)->update([
                            'logo_path'    => $new_filename, 
                            'business_name'    => $request->businessname, 
                            'category'    => $request->category, 
                            'description'    => $request->description, 
                            'linkedin'    => $request->linkedin, 
                            'siteprofiles'    => $request->siteprofiles
                        ]);
                    return redirect('users/buzprofile');
                }
            }else{
                 DB::table('business_profile')->where('users_id', auth()->user()->id)->update([
                            'business_name'    => $request->businessname, 
                            'category'    => $request->category, 
                            'description'    => $request->description, 
                            'linkedin'    => $request->linkedin, 
                            'siteprofiles'    => $request->siteprofiles
                ]);
                return redirect('users/buzprofile');
            }
        }else{
            if($request->hasFile('businesslogo')){
            
                $path       =   "/images/business_profile/";
                $file       =   $request->file('businesslogo');
                $filename   =   $file->getClientOriginalName();
                $new_filename   =   time().'_'.$filename;
    
                $upload = Storage::disk('public')->put($path.$new_filename, (string)file_get_contents($file));
    
                $post_thumbnail_path = $path.'thumbnails';
    
                if( !Storage::disk('public')->exists($post_thumbnail_path)){
                    Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
                }   
    
                Image::make( storage_path('app/public/'.$path.$new_filename))
                                    ->fit(200, 200)
                                    ->save( storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$new_filename));
    
                Image::make( storage_path('app/public/'.$path.$new_filename))
                                    ->fit(500, 350)
                                    ->save( storage_path('app/public/'.$path.'thumbnails/'.'resized_'.$new_filename));
    
                if( $upload ){
                    DB::insert('insert into business_profile (users_id, logo_path, business_name, category, description, linkedin, siteprofiles) values (?, ?,?,?,?,?,?)', [auth()->user()->id, $new_filename, $request->businessname, $request->category, $request->description, $request->linkedin, $request->siteprofiles]);
                    return redirect('users/buzprofile');
                }
            }
        }
        
        
    }
    
    public function buzprofile() {
        $props = DB::table('business_profile')->where('users_id', auth()->user()->id)->first();
        return view('back.pages.users.buzprofile', ['props' => $props]);  
    }
    
    public function editBuzprofile(){
        $props = DB::table('business_profile')->where('users_id', auth()->user()->id)->first();
        return view('back.pages.users.edit-buzprofile', ['props' => $props]);  
    }

     
}
