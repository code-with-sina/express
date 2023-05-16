<?php

namespace App\Http\Controllers;

// use auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Setting;
use App\Models\BankUser;
use App\Models\SetLabel;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\ExchangeItem;
use Illuminate\Http\Request;
use App\Events\ExpressPayEvent;
use App\Events\ChatMessageEvent;
use App\Models\ChatSubscription;
use App\Mail\PaymentDisbursement;
use App\Models\ExpressTransaction;
use App\Models\UserProfileAddress;
use App\Models\ExpressPayoutHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;



use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Models\ExpressTransactionChat;
use Illuminate\Support\Facades\Storage;
use App\Models\MerchantTransactionActivity;
use App\Notifications\TransactionNotification;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Notifications\EndTransactionNotification;
use App\Notifications\StartTransactionNotification;


class AuthController extends Controller
{
    //
    const BASEPATH = 1;
    
    public function home() {
        return view('home');
    }

    public function first_index(){
        return view('index');
    }

    public function index(Request $request) {
        return view('back.pages.home');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token = null){
        $data = [
            'pageTitle' => 'Reset Password',
        ];
        return view('back.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }

    public function changeProfilePicture(Request $request){
        $user               = User::find(auth('web')->id());
        $path               = 'back/dist/img/authors/';
        $file               = $request->file('file');
        $old_picture        = $user->getAttributes()['picture'];
        $file_path          = $path.$old_picture;
        $new_picture_name   = 'Ratefy-'.$user->id.time().rand(1,100000).'.jpg';

        if($old_picture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
        }

        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'picture' => $new_picture_name
            ]);

            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been succefully updated.']);
        }else{
            return response()->json(['status' => 0, 'msg' => 'Something went wrong']);
        }

    }

    public function changeBlogLogo(Request $request){
        $settings   =   Setting::find(1);
        $logo_path  =   'back/dist/img/logo-favicon';
        $old_logo   =   $settings->getAttributes()['blog_logo'];
        $file       =   $request->file('blog_logo');
        $filename   =   time().'_'.rand(1,100000).'_ratefy_logo.png';

        if($request->hasFile('blog_logo')){
            if($old_logo != null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $upload =   $file->move(public_path($logo_path), $filename);
            if($upload){
                $settings->update([
                    'blog_logo' => $filename
                ]);
                return response()->json(['status' => 1, 'msg' => 'Ratefy logo has been successfully uploaded.']);
            }else{
                return response()->json(['status' => 0, 'msg' => 'something went wrong']);
            }
        }
    }


    public function changeBlogFavicon(Request $request){
        $settings   =   Setting::find(1);
        $favicon_path  =   'back/dist/img/logo-favicon';
        $old_favicon   =   $settings->getAttributes()['blog_favicon'];
        $file       =   $request->file('blog_favicon');
        $filename   =   time().'_'.rand(1,2000).'_ratefy_favicon.ico';
        if($request->hasFile('blog_favicon')){
            if($old_favicon != null && File::exists(public_path($favicon_path.$old_favicon))){
                File::delete(public_path($favicon_path.$old_favicon));
            }
            $upload =   $file->move(public_path($favicon_path), $filename);
            if($upload){
                $settings->update([
                    'blog_favicon' => $filename
                ]);
                return response()->json(['status' => 1, 'msg' => 'Ratefy favicon has been successfully uploaded.']);
            }else{
                return response()->json(['status' => 0, 'msg' => 'something went wrong']);
            }
        }
    }

    public function createPost(Request $request) {
        $request->validate([
            'post_title'        => 'required|unique:posts,post_title',
            'post_content'      => 'required',
            'post_category'     => 'required|exists:sub_categories,id',
            'featured_image'    => 'required|mimes:jpeg,jpg,png|max:1024'
        ]);

        if($request->hasFile('featured_image')){
            $path       =   "/images/post_images/";
            $file       =   $request->file('featured_image');
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
                $post               = new Post();
                $post->author_id    = auth()->id();
                $post->category_id  = $request->post_category;
                $post->post_title   = $request->post_title;
                $post->post_tags    = $request->post_tags;
                $post->post_content = $request->post_content;
                $post->featured_image   = $new_filename;
                $saved = $post->save();

                if( $saved ){
                    return response()->json([
                        'code'  => 1,
                        'msg'   => 'You have successfully created a new post'
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

    public function editPost(Request $request) {
        if( !$request->post_id ){
            return abort(404);
        }else{
            $post = Post::find($request->post_id);
            $data = [
                'post'      => $post,
                'pageTitle' => 'Edit Post'
            ];
            return view('back.pages.edit_post', $data);
        }
    }

    public function updatePost(Request $request){
        if( $request->hasFile('featured_image') )
        {
            $request->validate([
                'post_title'        => 'required|unique:posts,post_title,'.$request->post_id,
                'post_content'      => 'required',
                'post_category'     => 'required|exists:sub_categories,id',
                'featured_image'    => 'required|mimes:jpeg,jpg,png|max:1024' 
            ]);

            $path   =   "images/post_images/";
            $file   =   $request->file('featured_image');
            $filename   =   $file->getClientOriginalName();
            $new_filename   =   time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

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
                    $old_post_image = Post::find($request->post_id)->featured_image;
                    if($old_post_image != null && Storage::disk('public')->exists($path.$old_post_image)){
                        Storage::disk('public')->delete($path.$old_post_image);

                        if( Storage::disk('public')->exists($path.'thumbnails/resized_'.$old_post_image)){
                            Storage::disk('public')->delete($path.'thumbnails/resized_'.$old_post_image);
                        }

                        if( Storage::disk('public')->exists($path.'thumbnails/thumb_'.$old_post_image)){
                            Storage::disk('public')->delete($path.'thumbnails/thumb_'.$old_post_image);
                        }
                    }
                    
                    $post = Post::find($request->post_id);
                    $post->category_id = $request->post_category;
                    $post->post_slug    = null;
                    $post->post_tags    = $request->post_tags;
                    $post->post_content = $request->post_content;
                    $post->post_title   = $request->post_title;
                    $post->featured_image   = $new_filename;
                    $saved = $post->save();

                    if( $saved ){
                        return response()->json([
                            'code'  => 1,
                            'msg'   => 'You have successfully created a new post'
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
                        'msg'   => 'Error in uploading new features' 
                    ]);
                }

        }else{
            $request->validate([
                'post_title'    => 'required|unique:posts,post_title,'.$request->post_id,
                'post_content'  => 'required',
                'post_category' => 'required|exists:sub_categories,id', 
            ]);

            $post = Post::find($request->post_id);
            $post->category_id  = $request->post_category;
            $post->post_slug    = null;
            $post->post_tags    = $request->post_tags;
            $post->post_content = $request->post_content;
            $post->post_title   = $request->post_title;

            $saved  =   $post->save();

            if($saved){
                return response()->json(['code' => 1, 'msg' => 'Your post has been successfully updated']);
            }else{
                return response()->json(['code' => 3, 'msg' => 'Something went wrong updating the post']);
            }
        }
    }
    

    public function createPaymentOption(Request $request){
        $request->validate([
            'exchange_image'    => 'required|mimes:jpeg,jpg,png|max:1024',
            'name'              => 'required',
            'percentage'        => 'required|numeric',
            'sub_item'          => 'required|string',
            'labels'            => 'required|string',
            'currency'            => 'required|string',
            'seller_note'            => 'required|string',
            'confirmation_note'            => 'required|string',
            'duration'            => 'required|string',
            'duration_cap'            => 'required|string',
        ]);


        if($request->hasFile('exchange_image')){
            $path       =   "/images/exchange_images/";
            $file       =   $request->file('exchange_image');
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

            $addData = new ExchangeItem();

            $addData->item                          = $request->name;
            $addData->percntage                     = $request->percentage;
            $addData->sub_item                      = $request->sub_item;
            $addData->labels                         = $request->labels;
            $addData->currency                      = $request->currency;
            $addData->seller_note                   = $request->seller_note;
            $addData->confirmation_note             = $request->confirmation_note;
            $addData->duration_cap            = $request->duration_cap;
            $addData->duration            = $request->duration;
            $addData->image_path        = $new_filename;
            $addData->active            = 1;
            

            $isSaved = $addData->save();

            if($isSaved){
                return response()->json(['code' => 1, 'msg' => 'Payment option has been successfully added']);
            }else{
                return response()->json(['code' => 3, 'msg' => 'Oops, something went wrong']);
            }
        }
    }


    public function editExchnageItem($id){
        return view('back.pages.edit-exchange-item', ['item' => ExchangeItem::find($id)]);
    }

    public function editPaymentOption(Request $request){

        if( $request->hasFile('exchange_image') )
        {
            $request->validate([
                'id'                => 'required',
                'name'              => 'required',
                'percentage'        => 'required|numeric',
                'sub_item'          => 'required|string',
                'labels'            => 'required|string',
                'currency'            => 'required|string',
                'seller_note'            => 'required|string',
                'confirmation_note'            => 'required|string',
                'duration_cap'            => 'required',
                'duration'            => 'required|string',
            ]);

            $path   =   "/images/exchange_images/";
            $file   =   $request->file('exchange_image');
            $filename   =   $file->getClientOriginalName();
            $new_filename   =   time().'_'.$filename;

            $upload = Storage::disk('public')->put($path.$new_filename, (string) file_get_contents($file));

            $post_thumbnail_path = $path.'thumbnails';

            if( !Storage::disk('public')->exists($post_thumbnail_path)){
                Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
            }   

            Image::make(storage_path('app/public/'.$path.$new_filename))
                                ->fit(200, 200)
                                ->save( storage_path('app/public/'.$path.'thumbnails/'.'thumb_'.$new_filename));

          

                if( $upload ){
                    $old_exchange_image = Post::find($request->id)->exchange_image;
                    if($old_exchange_image != null && Storage::disk('public')->exists($path.$old_exchange_image)){
                        Storage::disk('public')->delete($path.$old_exchange_image);

                      
                        if( Storage::disk('public')->exists($path.'thumbnails/thumb_'.$old_exchange_image)){
                            Storage::disk('public')->delete($path.'thumbnails/thumb_'.$old_exchange_image);
                        }
                    }
                    
                    $editData = ExchangeItem::find($request->id);
                    $editData->item = $request->name;
                    $editData->percntage    = $request->percentage;
                    $editData->sub_item          = $request->sub_item;
                    $editData->labels            = $request->labels;
                    $addData->currency                      = $request->currency;
                    $addData->seller_note                   = $request->seller_note;
                    $addData->confirmation_note             = $request->confirmation_note;
                    $addData->duration_cap            = $request->duration_cap;
                    $addData->duration            = $request->duration;
                    $editData->exchange_image   = $new_filename;
                    $saved = $editData->save();

                    if( $saved ){
                        return response()->json([
                            'code'  => 1,
                            'msg'   => 'You have successfully created a new Payment Option'
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
                        'msg'   => 'Error in uploading new features' 
                    ]);
                }
        }else{
            $request->validate([
                'id'                => 'required',
                'name'              => 'required',
                'percentage'        => 'required|numeric',
            ]);

            
            $editData = ExchangeItem::find($request->id);
            $editData->item = $request->name;
            $editData->percntage    = $request->percentage;
            $editData->sub_item          = $request->sub_item;
            $editData->labels            = $request->labels;
            $editData->currency                      = $request->currency;
            $editData->seller_note                   = $request->seller_note;
            $editData->confirmation_note             = $request->confirmation_note;
            $editData->duration_cap            = $request->duration_cap;
            $editData->duration            = $request->duration;
            $saved = $editData->save();
           

            if($saved){
                return back();
                // return response()->json(['code' => 1, 'msg' => 'Your payment option has been successfully updated']);
            }else{
                return back();
                // return response()->json(['code' => 3, 'msg' => 'Something went wrong updating the post']);
            }
        }
        
    }


    public function setLabels(Request $request){
        $request->validate([
                'labels'    => 'required|string'
            ]);
            
        SetLabel::create(['name' => $request->labels]);
            
       return  back();
    }

    public function editLabel(Request $request,  $id){

        $request->validate([
                'labels'    => 'required|string'
            ]);    
        SetLabel::find($id)->update([
                'name' => $request->labels
            ]);
            
       return  back();
    }


    public function deleteLabel($id){

            
        $delete = SetLabel::find($id);
        $delete->delete();
            
       return  back();
    }


    public function expressChats(Request $request){
        if($request->id){
            $notification = ExpressTransaction::where('order_id', $request->id)->first();
            return view('back.pages.author-admin.chat', ['transaction' => $notification]);
        }else{
            return view('back.pages.author-admin.chat');
        }   
    }
    
    
    public function sitemap(){
        return view('sitemap');
    }

    public function transactions(Request $request, $id){
        
        $currentTransaction = Transaction::where('transaction_id', $id)->first();
        return view('back.pages.transactions', [
            'transactions'  => $currentTransaction
        ]);
    }


    public function acceptOrderStart($id){
       //upload database with data
        $uploadTrans = new MerchantTransactionActivity();

        $uploadTrans->tnx_ref       = md5(time().uniqid().rand(11111, 4444));
        $uploadTrans->amount        = 700;
        $uploadTrans->success       = 1;
        $uploadTrans->failure       = 0;
        $uploadTrans->ratefy_ref    = $id;

        $check = $uploadTrans->save();

       //check if it is success and update start the transaction with notification

        if($check){
            $success = MerchantTransactionActivity::where('ratefy_ref', $id)->where('success', 1)->first();
            if($success->success == 1){
                $delayed = now()->addSecond(10);
                $notification = [
                    'client_name'       => 'Merchant has started the transaction',
                    'amount'            => 700,
                    'transaction'       => $id,
                    'instruction'       => 'You can now follow the instruction stipulated by the merchant',
                    'admin_policy'      => 'A fast and smooth transaction is expected. This is a yardstick for rating you',
                    'time'              => '10 minutes'
                ];
                Transaction::where('transaction_id', $id)->update(['start' => 1]);
                $seller = Transaction::where('transaction_id', $id)->first();
                $start = User::find($seller->users_id);
                $start->notify((new StartTransactionNotification($notification))->delay($delayed));
                return redirect('author/transactions/'.$id);
            }else{
                return back();
            } 
        }
    } 
    
    public function confirmAndRelease($id){
        Transaction::where('transaction_id', $id)->update(['end' => 1]);
        $delayed = now()->addSecond(10);
        $notification = [
            'client_name'       => 'Congratulation! completed transaction',
            'amount'            => 700,
            'transaction'       => $id,
            'instruction'       => 'Your transaction has been completed, expect your funds in your account soon',
            'admin_policy'      => 'A fast and smooth transaction is expected. This is a yardstick for rating you',
            'time'              => '10 minutes'
        ];
        Transaction::where('transaction_id', $id)->update(['start' => 1]);
        $seller = Transaction::where('transaction_id', $id)->first();
        $end = User::find($seller->users_id);
        $end->notify((new EndTransactionNotification($notification))->delay($delayed));
        
        return redirect('author/transactions/'.$id);
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

    public function chatMessage(Request $request)
    {
        event(new ChatMessageEvent($request->message, Auth::user(), $request->sessionId));
    }
    
    public function payMessage(Request $request)
    {
        event(new ExpressPayEvent($request->message, Auth::user(), $request->sessionId));
    }
    
    public function deleteConversation(Request $request)
    {
        // delete
        $delete = Chatify::deleteConversation($request['id']);

        // send the response
        return Response::json([
            'deleted' => $delete ? 1 : 0,
        ], 200);
    }




    public function manualPayOut(Request $request){
        $request->validate([
            'id'        => 'required',
            'session'   => 'required'
        ]);

        $paidMessage = "paid";
        $getData = ExpressTransaction::where('seller_id', $request->id)->where('order_id', $request->session)->first();

       if($getData !== null){
            $makeManualPay  = new ExpressPayoutHistory();

            $makeManualPay->tx_ref              = Str::uuid();
            $makeManualPay->amount              = $getData->conversion_amount;
            $makeManualPay->bank                = $getData->seller_bank_name;
            $makeManualPay->account_number      = $getData->seller_account_number;
            $makeManualPay->recipient_name      = $getData->seller_account_name;
            $makeManualPay->recipient_code      = 'manual-payment--'.Str::random(20);
            $makeManualPay->channel             = 'Bank/Mobil-money/transfer';
            $makeManualPay->status              = 'manual_confirmation';
            $makeManualPay->session_id          = $request->session;

            $inserted = $makeManualPay->save();

            if($inserted)
            {
                event(new ChatMessageEvent($paidMessage, Auth::user(), $request->sessionId));
                ExpressTransaction::where('seller_id', $request->id)->where('order_id', $request->session)->update([
                    'transaction_status'                => 'success',
                    'buyer_disbursment_confirmation'    => 1
                ]);
                
                $bank = ['account' => $getData->seller_account_name, 'number' => $getData->seller_account_number, 'bank' => $getData->seller_bank_name];
                        $payingUser = User::find($getData->seller_id);
                        Mail::to($payingUser)->send(new PaymentDisbursement($payingUser->name, $getData->conversion_amount, $getData->order_id, $getData->seller_account_name, $getData->seller_account_number, $getData->seller_bank_name));

                        
               return response()->json(['message' => 'success'], 200);
            }
           
       }

                
    }

    
        

    public function payout (Request $request)
    {
        $request->validate([
            'session'   => 'required',
            'account'   => 'required'
        ]);

        $paidMessage = "paid";
        $user = event(new ExpressPayEvent($message, Auth::user(), $request->session));


        $accertain = ExpressPayoutHistory::where('session_id', $request->session)->first();

        if($accertain != null) {
            if($accertain->transaction_status == 'success'){
                return response()->json([
                    'message' => 'transaction completed already',
                ]);
            }else {
                $getData = ExpressTransaction::where('order_id', $request->session)->first();
                $bankDetails = $this->retrieveUserBank($getData->seller_id, $request->account);
                $transaction_reference = Str::uuid()->toString();
                
                $getBank = Http::withHeaders([
                    'Authorization' => 'Bearer '.getenv('PAYSTACK_SECRET_KEY'),
                    'Content-Type' => 'application/json'
                ])->post('https://api.paystack.co/transferrecipient', [
                    'type'              => 'nuban',
                    'name'              => $bankDetails->account_name,
                    'account_number'    => $bankDetails->account_number,
                    'bank_code'         =>  $bankDetails->code,
                    'currency'          => 'NGN'
                ]);
                
                if($getBank->status() == 201){
                    $recipt =  $getBank->json();
                    $transactInit = Http::withHeaders([
                        'Authorization' => 'Bearer '.getenv('PAYSTACK_SECRET_KEY'),
                        'Content-Type' => 'application/json'
                    ])->post('https://api.paystack.co/transfer', [
                        'source'                => 'balance',
                        'amount'                => '450000',
                        'reference'             => $transaction_reference, 
                        'recipinet'             => $recipt['data']['recipient_code'],
                        'reason'                => 'Automated payout'
                    ]);

                    $status = $transactInit->json();
                    
                    $makeManualPay  = new ExpressPayoutHistory();

                    $makeManualPay->tx_ref              = $transaction_reference;
                    $makeManualPay->amount              = $getData->conversion_amount;
                    $makeManualPay->bank                = $getData->seller_bank_name;
                    $makeManualPay->account_number      = $getData->seller_account_number;
                    $makeManualPay->recipient_name      = $getData->seller_account_name;
                    $makeManualPay->recipient_code      = 'paystack-payment--'.$recipt['data']['recipient_code'];
                    $makeManualPay->channel             = 'paystack';
                    $makeManualPay->status              = $status['status'] == true ? 'success': 'fail';
                    $makeManualPay->session_id          = $request->session;

                    $inserted = $makeManualPay->save();

                    if($inserted)
                    {
                        if($status['status'] == true){
                            $message = 'paid';
                            event(new ExpressPayEvent($message, Auth::user(), $request->session));
                        }
                        $statar = $status['status'] == true ? 'success' : 'failure';

                        ExpressTransaction::where('order_id', $request->session)->update([
                            'transaction_status'                => $statar,
                            'buyer_disbursment_confirmation'    => 1
                        ]);

                        event(new ChatMessageEvent($paidMessage, Auth::user(), $request->sessionId));
                        $bank = ['account' => $getData->seller_account_name, 'number' => $getData->seller_account_number, 'bank' => $getData->seller_bank_name];
                        $payingUser = User::find($getData->seller_id);
                        Mail::to($payingUser)->send($payingUser->name, $getData->conversion_amount, $getData->order_id, $bank);
                        return response()->json([
                            'bank' => $status['status'],
                        ], 200);
                    } 
                }
            }
            

            
        }else{
            $getData = ExpressTransaction::where('order_id', $request->session)->first();
            $bankDetails = $this->retrieveUserBank($getData->seller_id, $request->account);
            $transaction_reference = Str::uuid()->toString();
            
            $getBank = Http::withHeaders([
                'Authorization' => 'Bearer '.getenv('PAYSTACK_SECRET_KEY'),
                'Content-Type' => 'application/json'
            ])->post('https://api.paystack.co/transferrecipient', [
                'type'              => 'nuban',
                'name'              => $bankDetails->account_name,
                'account_number'    => $bankDetails->account_number,
                'bank_code'         =>  $bankDetails->code,
                'currency'          => 'NGN'
            ]);
            
            if($getBank->status() == 201){
                $recipt =  $getBank->json();
                $transactInit = Http::withHeaders([
                    'Authorization' => 'Bearer '.getenv('PAYSTACK_SECRET_KEY'),
                    'Content-Type' => 'application/json'
                ])->post('https://api.paystack.co/transfer', [
                    'source'                => 'balance',
                    'amount'                => '450000',
                    'reference'             => $transaction_reference, 
                    'recipinet'             => $recipt['data']['recipient_code'],
                    'reason'                => 'Automated payout'
                ]);

                $status = $transactInit->json();
                
                $makeManualPay  = new ExpressPayoutHistory();

                $makeManualPay->tx_ref              = $transaction_reference;
                $makeManualPay->amount              = $getData->conversion_amount;
                $makeManualPay->bank                = $getData->seller_bank_name;
                $makeManualPay->account_number      = $getData->seller_account_number;
                $makeManualPay->recipient_name      = $getData->seller_account_name;
                $makeManualPay->recipient_code      = 'paystack-payment--'.$recipt['data']['recipient_code'];
                $makeManualPay->channel             = 'paystack';
                $makeManualPay->status              = $status['status'] == true ? 'success': 'fail';
                $makeManualPay->session_id          = $request->session;

                $inserted = $makeManualPay->save();

                if($inserted)
                {
                    $statar = $status['status'] == true ? 'success' : 'failure';

                    ExpressTransaction::where('order_id', $request->session)->update([
                        'transaction_status'                => $statar,
                        'buyer_disbursment_confirmation'    => 1
                    ]);

                    $bank = ['account' => $getData->seller_account_name, 'number' => $getData->seller_account_number, 'bank' => $getData->seller_bank_name];
                        $payingUser = User::find($getData->seller_id);
                        Mail::to($payingUser)->send($payingUser->name, $getData->conversion_amount, $getData->order_id, $bank);

                    return response()->json([
                        'bank' => $status['status'],
                    ], 200);
                } 
            }
        }
        

           
    }

   public function retrieveUserBank($id, $account){
        $getBank =  BankUser::where('users_id', $id)->where('account_number', $account)->first();
        return $getBank;
   }


    public function transactionDetail(Request $request)
    {
        ChatSubscription::where('session_id', $request->id)->update(['status' => 'attended']);
        $getDetail = ExpressTransaction::where('order_id', $request->id)->first();

        $seller = User::find($getDetail->seller_id);
        $buyer = User::find($getDetail->buyer_id);
        $address = UserProfileAddress::where('users_id', $getDetail->seller_id)->first();
        $banks = BankUser::where('users_id', $getDetail->seller_id)->where('account_number',  $getDetail->seller_account_number)->first();
        // $channel = ExpressPayoutHistory::where('', $request->id);
        
        return view('back.pages.express-transaction-detail', ['detail' => $getDetail, 'seller' => $seller, 'buyer' => $buyer, 'address' => $address, 'banks' => $banks]);
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }


    public function dashboard(){
        return view('dashboard');
    }

    public function activeExchange(){
        return view('active-dashboard');
    }

    public function pastExchange(){
        return view('past-dashboard');
    }

    public function bankAccount()
    {
        return view('bank-account');
    }

    public function profile()
    {
        return view('profile');
    }

    public function profileEdit()
    {
        return view('profile-edit');
    }

    public function delRequest()
    {
        return view('delivery-request');
    }

    public function newCalculator()
    {
        return view('new-calculator');
    }

    public function emails() {
        return view('emails');
    }
    
}
