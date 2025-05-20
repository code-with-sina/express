<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\BankUser;
use App\Models\AffiliateAuth;
use App\Models\CounterPartyAccount;
use App\Models\Transaction;
use App\Models\UserVerification;
use App\Models\InitiateCommission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;
use App\Mail\PaymentInstruction;
use App\Models\ChatSubscription;
use App\Models\ExpressTransaction;
use App\Models\ExchangeItem;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Models\ExpressTransactionChat;
use Illuminate\Support\Facades\Storage;
use App\Mail\AwaitingPaymentConfirmation;
use App\Mail\AdminTransactionNotification;
use App\Events\TransactionNotificationEvent;
use Illuminate\Support\Facades\Notification;
use App\Mail\NotifyAdmin;
use Session;
use App\Models\NetAuthTransceiver;
use App\Notifications\TransactionNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Mail\CancelTransaction;

use App\Jobs\ProcessTransactionJob;

use App\Models\UserFeedBack;

class UsersController extends Controller
{
    //
    public function activate($req)
    {
        $users = new User();

        $activateUser = $users->where('emailcode', $req)->update([
            'activate'  => 1,
            'email_verified_at' => Carbon::now()
        ]);

        if ($activateUser) {
            return redirect('users/login');
        }
    }

    public function home()
    {
        return view('home');
    }

    public function index(Request $request)
    {
        return view('back.pages.users.home');
    }

    public function logout()
    {
        $user = User::where('id', auth()->user()->id)->first();

        Http::post('https://p2p.ratefy.co/users/auto-logout', [
            'uuid'  => $user->uuid
        ]);
        Auth::guard('web')->logout();
        return redirect('./');
    }

    public function ResetForm(Request $request, $token = null)
    {
        $data = [
            'pageTitle' => 'Reset Password',
        ];
        return view('back.pages.seller_auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }

    public function sellOut(Request $request)
    {
        $request->validate([
            'amount'        => 'required',
            'buying_id'     => 'required',
            'wallets'       => 'required',
        ]);
        $transactions           = md5(uniqid(time()));
        $sell = new Transaction();

        $sell->users_id         = auth('web')->id();
        $sell->seller_id        = $request->buying_id;
        $sell->amount           = $request->amount;
        $sell->amount_release   = $request->amount;
        $sell->selling          = $request->wallets;
        $sell->transaction_id   = $transactions;

        if ($sell->save()) {

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

            return redirect('users/transactions/' . $transactions);
        } else {
            return back();
        }
    }

    public function transactions(Request $request, $id)
    {

        $currentTransaction = Transaction::where('transaction_id', $id)->first();
        return view('back.pages.users.transactions', [
            'transactions'  => $currentTransaction
        ]);
    }

    public function expressTransaction(Request $request)
    {

        $orderId = Str::random(60);
        // $process = new ProccessTransactionJob();
        // $process->dispatch($request, $orderId)->onConnection('database');

        $buyerId = '';
        $data = json_decode($request->getContent(), true);

        $user = User::where('id', auth()->user()->id)->first();
        $bank = CounterPartyAccount::where('id', $data['bank'])->first();

        $sellerTerms = ExchangeItem::where('id', $request->wallet_id)->first();

        $buyer = User::where('type', '1')->get();

        foreach ($buyer as $item) {
            if ($item->name == 'Femi Odeyemi') {
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
        $initiate->transaction_status   = 'pending';

        $initiate->conversion_percentage    = $data['rate'];
        $initiate->seller_account_number    = $sellerBankDetail['account'];

        $initiate->express_binding_detail_duration      = '30';
        $initiate->express_binding_detail_start_time    = Carbon::now();
        $initiate->express_binding_detail_end_time      = Carbon::now()->addMinutes(30);
        $initiate->express_binding_detail_note          = $sellerTerms->inner_seller_note;
        $initiate->express_binding_confirmation_note    = $sellerTerms->confirmation_note;
        $processTransact    = $initiate->save();

        $mailBody = $sellerTerms->seller_note;


        if ($processTransact) {
            $checkaffiliate = Http::post('https://affiliatebased.ratefy.co/api/check-if-user-is-referred', [
                'uuid'  => auth()->user()->uuid
            ]);

            if ($checkaffiliate->status() == 200) {
                $detail = $checkaffiliate->object();
                $commissionRewards = $this->getCommissionAmount($request->wallet_id,  $data['amount']);
                InitiateCommission::create([
                    'amount'    => $commissionRewards,
                    'from_uuid'  => $detail->customer,
                    'to_uuid'  => $detail->affiliated,
                    'status'    => 'not sent',
                    'session'   => $orderId
                ]);
            }
            // $session = ChatSubscription::where('user_id', auth()->user()->id)->first();

            ExpressTransactionChat::create([
                'session_id'    => $orderId,
                'message'       => $sellerTerms->inner_seller_note,
                'user_id'       => $buyerId,
                'sender_id'     => $buyerId,
                'receiver_id'   => $buyerId
            ]);
            $adminUser = User::find($buyerId);
            event(new ChatMessageEvent($sellerTerms->inner_seller_note, $adminUser, $orderId));
            $getRedirect = ExpressTransaction::where('order_id', $orderId)->first();
            $chatSub = new ChatSubscription();
            $chatSub->user_id = auth()->user()->id;
            $chatSub->session_id = $getRedirect->order_id;
            $chatSub->save();

            $notifyAdmin = User::find($buyerId);
            $notifySubAdmin = User::find(306);
            $notifyAdminB = User::find(145);
            Mail::to($notifyAdmin)->send(new AdminTransactionNotification($user->name, $orderId, $data['amount']));
            Mail::to($notifyAdminB)->send(new AdminTransactionNotification($user->name, $orderId, $data['amount']));
            Mail::to($notifySubAdmin)->send(new AdminTransactionNotification($user->name, $orderId, $data['amount']));
            Mail::to($user)->send(new PaymentInstruction($user->name, $mailBody, $orderId, $data['amount'],  Carbon::now()));


            // Send sms Here
            $madeOn = "https://ratefy.co/author/express-transactions?id=" . $orderId;
            $messageText = 'Order Initiated from ' . $madeOn . ' --' . $sellerDetail['seller_name'] . ' --amount: ' . $data['amount'] . ' --' . Carbon::now();



            $this->sendSMSForAdmin($messageText);
            $this->sendSMSForStaff($messageText);
            $ipAddress = request()->ip();
            $userAgent = request()->header('User-Agent');

            $trackingData = (object) [

                'ipAddress' => $ipAddress,
                'userAgent' => $userAgent,
                "firstname" => $user->name,
                "lastname" => $user->name,
                "email" => $user->email,
                'mobile_number' => $user->mobile_number,

                'userId' => $user->id,
                'orderId' => $orderId,

            ];
            $facebookTrackingController = new FacebookPixelsController();

            $facebookTrackingController->trackTransactionEvent($trackingData);
            return response()->json([
                'message'   => $getRedirect->order_id
            ], 200);
        } else {
            return response()->json([
                'message'  => $processTransact->getMessage()
            ], 400);
        }
    }

    public function getCommissionAmount($id, $amount)
    {
        $getItem = ExchangeItem::where('id', $id)->first();
        $normal = ExchangeRate::latest()->first();
        $input = (int)$normal->rate_normal * ((100 - $getItem->percntage)  / 100);
        $getDevision = (2.0 * $input) / 100;
        $overAllCommision = $getDevision * $amount;
        $affiliateCommision = $overAllCommision / 4;

        return $affiliateCommision;
    }

    public function sendSMSForStaff($messageText)
    {
        Http::post('https://api.ng.termii.com/api/sms/send', [
            'from'  => 'N-Alert',
            'to'    => '+2347045489688',
            'sms'   => $messageText,
            'type'  => 'plain',
            'channel' => 'dnd',
            'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
        ]);
    }


    public function sendSMSForAdmin($messageText)
    {
        Http::post('https://api.ng.termii.com/api/sms/send', [
            'from'  => 'N-Alert',
            'to'    => '+2349134860154',
            'sms'   => $messageText,
            'type'  => 'plain',
            'channel' => 'dnd',
            'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
        ]);
    }

    public function newCalculator(Request $request)
    {

        return view('back.pages.users.new-calculators');
    }

    public function popPayment(Request $request)
    {
        if ($request->hasFile('image')) {
            $path       =   "/images/pop_payment/";
            $file       =   $request->file('image');
            $filename   =   $file->getClientOriginalName();
            $new_filename   =   time() . '_' . $filename;

            $upload = Storage::disk('public')->put($path . $new_filename, (string)file_get_contents($file));

            $post_thumbnail_path = $path . 'thumbnails';

            if (!Storage::disk('public')->exists($post_thumbnail_path)) {
                Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
            }

            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));

            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'resized_' . $new_filename));

            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'original_' . $new_filename));

            if ($upload) {
                $update = ExpressTransaction::where('order_id', $request->session)->update(['pop_path' =>  $new_filename]);


                if ($update) {

                    // Send sms Here
                    $madeOn = "https://ratefy.co/author/express-transactions?id=" . $request->session;
                    $messageText = 'POP Submited from ' . $madeOn . ' --' . Carbon::now();
                    $this->sendSMSForAdmin($messageText);

                    return response()->json([
                        'code'  => 1,
                        'msg'   => $new_filename
                    ]);
                } else {
                    return response()->json([
                        'code'  => 3,
                        'msg'   => 'Something went wrong while saving data'
                    ]);
                }
            } else {
                return response()->json([
                    'code'  => 3,
                    'msg'   => 'Something went wrong while uploading the image'
                ]);
            }
        }
    }

    public function cancelPayment(Request $request)
    {
        $update = ExpressTransaction::where('order_id', $request->session)->update(['transaction_status' =>  'closed']);
        Mail::to(Auth::user())->send(new CancelTransaction(auth()->user()->name, $request->session,  Carbon::now()));
    }

    public function popApproval(Request $request)
    {
        $updated = ExpressTransaction::where('order_id', $request->session)->update(['seller_payment_approval' => 1, 'pop_confirmation' => 1, 'transaction_status' => 'processing']);
        $takeOut = ExpressTransaction::where('order_id', $request->session)->first();
        $madeOn = "https://ratefy.co/author/express-transactions?id=" . $request->session;
        $messageText = 'Payment approval request from ' . $madeOn . ' --' . Carbon::now();

        $this->sendSMSForAdmin($messageText);

        Mail::to(Auth::user())->send(new AwaitingPaymentConfirmation($takeOut->seller_name, $request->session, $takeOut->wallet_amount, $takeOut->wallet_name, $takeOut->created_at));


        if ($updated) {
            return response()->json(['success' => 'success'], 200);
        }
    }

    public function popPaymentApproval(Request $request)
    {

        if ($request->hasFile('image')) {
            $path       =   "/images/pop_payment/";
            $file       =   $request->file('image');
            $filename   =   $file->getClientOriginalName();
            $new_filename   =   time() . '_' . $filename;

            $upload = Storage::disk('public')->put($path . $new_filename, (string)file_get_contents($file));

            $post_thumbnail_path = $path . 'thumbnails';

            if (!Storage::disk('public')->exists($post_thumbnail_path)) {
                Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
            }

            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));

            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'resized_' . $new_filename));

            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'original_' . $new_filename));

            if ($upload) {
                $update = ExpressTransaction::where('order_id', $request->session)->update(['pop_path' =>  $new_filename]);


                if ($update) {

                    $getwallet = ExpressTransaction::where('order_id', $request->session)->first();
                    $postConfirm = ExchangeItem::where('id', $getwallet->wallet_id)->first();
                    $adminUser = User::find($getwallet->buyer_id);

                    $message = "I have made payment";
                    ExpressTransactionChat::create([
                        'session_id'    => $request->session,
                        'message'       => $postConfirm->confirmation_note,
                        'user_id'       => $getwallet->buyer_id,
                        'sender_id'     => $getwallet->buyer_id,
                        'receiver_id'   => $getwallet->buyer_id
                    ]);

                    event(new ChatMessageEvent($message, $adminUser, $request->session));

                    $updated = ExpressTransaction::where('order_id', $request->session)->update(['seller_payment_approval' => 1, 'pop_confirmation' => 1, 'transaction_status' => 'processing']);
                    $takeOut = ExpressTransaction::where('order_id', $request->session)->first();
                    $madeOn = "https://ratefy.co/author/express-transactions?id=" . $request->session;
                    $messageText = 'POP Submited and Payment approval request from ' . $madeOn . ' --' . Carbon::now();

                    $this->sendSMSForAdmin($messageText);

                    Mail::to(Auth::user())->send(new AwaitingPaymentConfirmation($takeOut->seller_name, $request->session, $takeOut->wallet_amount, $takeOut->wallet_name, $takeOut->created_at));
                    if ($updated) {
                        return response()->json(['success' => 'success'], 200);
                    }

                    return response()->json([
                        'code'  => 1,
                        'msg'   => $new_filename
                    ]);
                } else {
                    return response()->json([
                        'code'  => 3,
                        'msg'   => 'Something went wrong while saving data'
                    ]);
                }
            } else {
                return response()->json([
                    'code'  => 3,
                    'msg'   => 'Something went wrong while uploading the image'
                ]);
            }
        }
    }

    public function chat(Request $request)
    {
        $session = ChatSubscription::where('user_id', auth()->user()->id)->first();
        event(new ChatMessageEvent($request->message, Auth::user(), $request->sessionId));
    }


    public function messageadmin(Request $request)
    {
        $admin  =  User::where('id', 134)->first();
        $staff  =  User::where('id', 306)->first();
        $adminB  =  User::where('id', 145)->first();
        Mail::to($admin)->send(new NotifyAdmin($request->message, $request->sessionId, auth()->user()->username));
        Mail::to($staff)->send(new NotifyAdmin($request->message, $request->sessionId, auth()->user()->username));
        Mail::to($adminB)->send(new NotifyAdmin($request->message, $request->sessionId, auth()->user()->username));
    }

    public function expressTransactionMessages(Request $request)
    {
        $request->validate([
            'user_id'       => 'required',
            'message'       => 'required',
            'session_id'    => 'required',
            'sender_id'     => 'required',
            'receiver_id'   => 'required'
        ]);

        $saveChat = new ExpressTransactionChat();
        $saveChat->user_id      = $request->user_id;
        $saveChat->sender_id      = $request->sender_id;
        $saveChat->receiver_id      = $request->receiver_id;
        $saveChat->message      = $request->message;
        $saveChat->session_id   = $request->session_id;

        $saveChat->save();
    }

    public function expressTransactionMessagesHistory(Request $request)
    {
        $request->validate([
            'session_id'    => 'required'
        ]);

        $grapChat =  ExpressTransactionChat::where('session_id', $request->session_id)->get();
        return response()->json(['message' => $grapChat], 200);
    }


    public function chatSubscription(Request $request)
    {
        $session = ChatSubscription::where('user_id', $request->data)->first();
        return response()->json(['data' => $session->session_id], 200);
    }

    public function expressTransactionActivity(Request $request)
    {
        if ($request->message) {
            $sessionId = $request->message;
        }
        return view('back.pages.users.express-transaction', ['sessionid' => $sessionId]);
    }

    public function mobileExpressTransactionActivity(Request $request)
    {
        if ($request->message) {
            $sessionId = $request->message;
        }
        return view('back.pages.users.mobile-express-transaction', ['sessionid' => $sessionId]);
    }

    public function awaitingConfirmation()
    {
        return view('back.pages.users.express-awaiting-confirmation');
    }

    public function completeTransaction()
    {
        return view('back.pages.users.express-complete-transaction');
    }

    public function caluculator(Request $request)
    {
        if ($request->input('id') !== null) {
            return view('back.pages.users.calculate');
        } else {
            return redirect('/users/home');
        }
    }

    public function whatsapp()
    {
        DB::insert('insert into whatsapp (users_id, name, initiated) values (?, ?,?)', [auth()->user()->id, auth()->user()->name, Carbon::now()]);
        return redirect('https://wa.link/xe08a5');
    }

    public function businessProfileCreate(Request $request)
    {



        $check = DB::table('business_profile')->where('users_id', auth()->user()->id)->first();

        if ($check !== null) {
            $request->validate([
                'logo_path'         => 'nullable|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'business_name'     => 'required|string',
                'category'          => 'required|string',
                'description'       => 'required|string',
                'linkedin'          => 'required|string',
                'siteprofiles'      => 'required|string'
            ]);
            if ($request->hasFile('businesslogo')) {

                $path       =   "/images/business_profile/";
                $file       =   $request->file('businesslogo');
                $filename   =   $file->getClientOriginalName();
                $new_filename   =   time() . '_' . $filename;

                $upload = Storage::disk('public')->put($path . $new_filename, (string)file_get_contents($file));

                $post_thumbnail_path = $path . 'thumbnails';

                if (!Storage::disk('public')->exists($post_thumbnail_path)) {
                    Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
                }

                Image::make(storage_path('app/public/' . $path . $new_filename))
                    ->fit(200, 200)
                    ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));

                Image::make(storage_path('app/public/' . $path . $new_filename))
                    ->fit(500, 350)
                    ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'resized_' . $new_filename));

                if ($upload) {
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
            } else {
                DB::table('business_profile')->where('users_id', auth()->user()->id)->update([
                    'business_name'    => $request->businessname,
                    'category'    => $request->category,
                    'description'    => $request->description,
                    'linkedin'    => $request->linkedin,
                    'siteprofiles'    => $request->siteprofiles
                ]);
                return redirect('users/buzprofile');
            }
        } else {
            $request->validate([
                'logo_path'         => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'business_name'     => 'required|string',
                'category'          => 'required|string',
                'description'       => 'required|string',
                'linkedin'          => 'required|string',
                'siteprofiles'      => 'required|string'
            ]);
            if ($request->hasFile('businesslogo')) {

                $path       =   "/images/business_profile/";
                $file       =   $request->file('businesslogo');
                $filename   =   $file->getClientOriginalName();
                $new_filename   =   time() . '_' . $filename;

                $upload = Storage::disk('public')->put($path . $new_filename, (string)file_get_contents($file));

                $post_thumbnail_path = $path . 'thumbnails';

                if (!Storage::disk('public')->exists($post_thumbnail_path)) {
                    Storage::disk('public')->makeDirectory($post_thumbnail_path, 0755, true, true);
                }

                Image::make(storage_path('app/public/' . $path . $new_filename))
                    ->fit(200, 200)
                    ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));

                Image::make(storage_path('app/public/' . $path . $new_filename))
                    ->fit(500, 350)
                    ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'resized_' . $new_filename));

                if ($upload) {
                    DB::insert('insert into business_profile (users_id, logo_path, business_name, category, description, linkedin, siteprofiles) values (?, ?,?,?,?,?,?)', [auth()->user()->id, $new_filename, $request->businessname, $request->category, $request->description, $request->linkedin, $request->siteprofiles]);
                    return redirect('users/buzprofile');
                }
            } else {
                return back()->with('status', 'You didn\'t upload your profile logo');
            }
        }
    }

    public function buzprofile()
    {
        $props = DB::table('business_profile')->where('users_id', auth()->user()->id)->first();
        return view('back.pages.users.buzprofile', ['props' => $props]);
    }

    public function editBuzprofile()
    {
        $props = DB::table('business_profile')->where('users_id', auth()->user()->id)->first();
        return view('back.pages.users.edit-buzprofile', ['props' => $props]);
    }

    public function verifiable()
    {
        // $token = $this->getToken();
        $verification = UserVerification::where('users_id', auth()->user()->id)->first();
        return view('back.pages.users.verification', ['status' => $verification]);
    }

    public function getToken()
    {
        $bearerToken = Http::asForm()->acceptJson()->withBasicAuth('6474ef5ad96a63001c514615', '42Y3NYGNEVAFA4KI6ZYMXRBAT4GEAEXC')->post('https://api.getmati.com/oauth', ['grant_type' => 'client_credentials']);
        return $bearerToken->json();
    }

    public function startVerification(Request $request)
    {
        // $userId = auth()->user()->id;
        // $userUnique = Str::uuid();

        // $url = WebhookCall::create()
        // ->url('https://ratefy.co/webhooks')
        // ->payload(['key' => 'value'])
        // ->useSecret('sign-using-this-secret')
        // ->dispatch();

        // $vNiN = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        //     'Authorization' => 'Bearer '.$request->vtoken
        // ])->post('https://api.getmati.com/govchecks/v1/ng/vnin', [
        //     'vNIN'          => 'ev573833433458n6',
        //     'firstName'     => 'Femi',
        //     'lastName'      => 'Odeyemi',
        //     'dateOfBirth'   => '1996-08-05',
        //     'callbackUrl'   => 'https://ratefy.co/receiving-url-for-getmati-to-ratefy',
        //     'metadata' => [
        //         'user' => $userId,
        //         'id'    => 'nbdsdfhbsfshbfshfsfhsfsh'
        //     ]
        // ]);

        // return back()->with('status', $vNiN);

        // **************

        $request->validate([
            'nin_slip'      => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'selfie'        => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $userId = auth()->user()->id;

        if ($request->hasFile('nin_slip') && $request->hasFile('selfie')) {
            $nin_path       =   "/images/verification/";
            $nin_file       =   $request->file('nin_slip');
            $nin_filename   =   $nin_file->getClientOriginalName();
            $nin_new_filename   =   time() . '_' . $nin_filename;

            $nin_upload = Storage::disk('public')->put($nin_path . $nin_new_filename, (string)file_get_contents($nin_file));

            $nin_post_thumbnail_path = $nin_path . 'thumbnails';

            //**************** */

            $selfie_path       =   "/images/verification/";
            $selfie_file       =   $request->file('selfie');
            $selfie_filename   =   $selfie_file->getClientOriginalName();
            $selfie_new_filename   =   time() . '_' . $selfie_filename;

            $selfie_upload = Storage::disk('public')->put($selfie_path . $selfie_new_filename, (string)file_get_contents($selfie_file));

            $selfie_post_thumbnail_path = $selfie_path . 'thumbnails';

            if (!Storage::disk('public')->exists($nin_post_thumbnail_path) && !Storage::disk('public')->exists($selfie_post_thumbnail_path)) {
                Storage::disk('public')->makeDirectory($nin_post_thumbnail_path, 0755, true, true);
                Storage::disk('public')->makeDirectory($selfie_post_thumbnail_path, 0755, true, true);
            }

            Image::make(storage_path('app/public/' . $nin_path . $nin_new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $nin_path . 'thumbnails/' . 'thumb_' . $nin_new_filename));

            Image::make(storage_path('app/public/' . $nin_path . $nin_new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $nin_path . 'thumbnails/' . 'resized_' . $nin_new_filename));


            Image::make(storage_path('app/public/' . $selfie_path . $selfie_new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $selfie_path . 'thumbnails/' . 'thumb_' . $selfie_new_filename));

            Image::make(storage_path('app/public/' . $selfie_path . $selfie_new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $selfie_path . 'thumbnails/' . 'resized_' . $selfie_new_filename));

            if ($nin_upload && $selfie_upload) {
                $verification = new UserVerification();
                $verification->users_id = $userId;
                $verification->nin_path = $nin_new_filename;
                $verification->selfie_path = $selfie_new_filename;
                $verification->status = 'pending';
                $verification->save();

                return back()->with('status', 'pending');;
            }
        }
    }

    public function updateVerification(Request $request)
    {
        $request->validate([
            'nin_slip'      => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'selfie'        => 'required|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);


        $userId = auth()->user()->id;

        if ($request->hasFile('nin_slip') && $request->hasFile('selfie')) {
            $nin_path       =   "/images/verification/";
            $nin_file       =   $request->file('nin_slip');
            $nin_filename   =   $nin_file->getClientOriginalName();
            $nin_new_filename   =   time() . '_' . $nin_filename;

            $nin_upload = Storage::disk('public')->put($nin_path . $nin_new_filename, (string)file_get_contents($nin_file));

            $nin_post_thumbnail_path = $nin_path . 'thumbnails';

            //**************** */

            $selfie_path       =   "/images/verification/";
            $selfie_file       =   $request->file('selfie');
            $selfie_filename   =   $selfie_file->getClientOriginalName();
            $selfie_new_filename   =   time() . '_' . $selfie_filename;

            $selfie_upload = Storage::disk('public')->put($selfie_path . $selfie_new_filename, (string)file_get_contents($selfie_file));

            $selfie_post_thumbnail_path = $selfie_path . 'thumbnails';

            if (!Storage::disk('public')->exists($nin_post_thumbnail_path) && !Storage::disk('public')->exists($selfie_post_thumbnail_path)) {
                Storage::disk('public')->makeDirectory($nin_post_thumbnail_path, 0755, true, true);
                Storage::disk('public')->makeDirectory($selfie_post_thumbnail_path, 0755, true, true);
            }

            Image::make(storage_path('app/public/' . $nin_path . $nin_new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $nin_path . 'thumbnails/' . 'thumb_' . $nin_new_filename));

            Image::make(storage_path('app/public/' . $nin_path . $nin_new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $nin_path . 'thumbnails/' . 'resized_' . $nin_new_filename));


            Image::make(storage_path('app/public/' . $selfie_path . $selfie_new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $selfie_path . 'thumbnails/' . 'thumb_' . $selfie_new_filename));

            Image::make(storage_path('app/public/' . $selfie_path . $selfie_new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $selfie_path . 'thumbnails/' . 'resized_' . $selfie_new_filename));

            if ($nin_upload && $selfie_upload) {
                UserVerification::where('users_id', $userId)->update([
                    'nin_path' => $nin_new_filename,
                    'selfie_path' => $selfie_new_filename,
                    'status' => 'pending'
                ]);
                return back()->with('status', 'pending');;
            }
        }
    }


    public function getSessions(Request $request)
    {
        $session = ExpressTransaction::where('seller_id', auth()->user()->id)->latest()->first();
        return $session;
    }

    public function bankprofilefeature()
    {
        return view('back.pages.users.upcoming');
    }

    public function newChatHome(Request $request)
    {
        if ($request->message) {
            $sessionId = $request->message;
        }
        return view('back.pages.users.new-chat', ['sessionid' => $sessionId]);
    }

    public function newChatMobile(Request $request)
    {
        if ($request->message) {
            $sessionId = $request->message;
        }
        return view('back.pages.users.new-mobile-chat', ['sessionid' => $sessionId]);
    }

    public function getUsername(Request $request)
    {
        $username = User::find($request->userId);

        return response()->json([
            'data'  => $username->username
        ]);
    }

    public function getFeedback(Request $request)
    {
        $feedback = new UserFeedBack();
        $feedback->user_id = auth()->user()->id;
        $feedback->session_id = $request->sessionId;
        $feedback->status = $request->status;
        $feedback->description = $request->description;

        if ($feedback->save()) {
            return response()->json(['data' => 'success'], 200);
        }
    }

    public function deviceChecker(Request $request)
    {
        if ($request->message) {
            $sessionId = $request->message;
        }
        return view('back.pages.users.checkdevice', ['sessionid' => $sessionId]);
    }

    public function userAccount(Request $request)
    {
        $request->validate(['uuid' => ['required', 'string']]);

        $user = User::where('uuid', $request->uuid)->first();
        $accountDetail = CounterPartyAccount::where('users_id', $user->id)->get();
        return response()->json(['accountdetails' => $accountDetail]);
    }

    public function userDetail(Request $request)
    {
        $user = User::where('uuid', $request->uuid)->first();
        return response()->json(['users' => $user]);
    }


    public function verifyUserIsAffiliate(Request $request)
    {
        $request->validate([
            'uuid'  => ['required', 'string'],
            'auth'  => ['required', 'string']
        ]);

        $verified = User::where('uuid', $request->uuid)->first();

        if ($verified) {
            $approval = AffiliateAuth::where('uuid', $verified->uuid)->where('code', $request->auth)->where('status', 'created')->first();
            if ($approval) {
                AffiliateAuth::where('uuid', $verified->uuid)->where('code', $request->auth)->update(['status' => 'used']);
                return response()->json([
                    'status' => 'approved'
                ]);
            } else {
                return response()->json([
                    'status' => 'denied'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'denied'
            ]);
        }
    }


    public function createAuthorization(Request $request)
    {
        $code = AffiliateAuth::create([
            'uuid'  => auth()->user()->uuid,
            'code'  => md5(auth()->user()->firstname . time() . Carbon::now()),
            'status' => 'created'
        ]);

        $location = 'https://affiliate.ratefy.co/' . auth()->user()->uuid . '/' . auth()->user()->username . '/' . $code->code;
        return redirect($location);

        // return response()->json([
        //     'code' => $code->code
        // ]);
    }


    public function authTest($token)
    {
        $auth = NetAuthTransceiver::where('token', $token)->first();
        if ($auth->expires_at > Carbon::now()) {
            if ($auth->one_grant == 'pending'  || $auth->one_grant == 'granted') {
                $auth->update(['one_grant' => 'granted']);
                $toks = $this->makeDecrypt(token: $auth->token, grantPass: $auth->grant_pass);
                $checks = $this->confirmBroadcastAuth($toks);
                if ($checks == 200) {
                    $auth->update(['one_grant' => 'expired']);
                    Auth::loginUsingId((int)$auth->user_id, remember: true);
                    return redirect()->route('users.home');
                } else {
                    return redirect()->away('https://market.ratefy.co/auth/login');
                }
            } else {
                return redirect()->away('https://market.ratefy.co/auth/login');
            }
        } else {
            return redirect()->away('https://market.ratefy.co/auth/login');
        }
    }


    public function recieveAuthenticateUser() {}


    public function authBroadcastConfirmation(Request $request)
    {
        $receiveBroadcast = new NetAuthTransceiver();
        $receiveBroadcast->create([
            'token'             => $request->token,
            'user_id'           => $request->user_id,
            'from_subdomain'    => $request->from_subdomain,
            'grant_pass'        => $request->grant_pass,
            'one_grant'         => 'pending',
            'expires_at'        => Carbon::now()->addMinutes(5)
        ]);
    }

    public function makeDecrypt($token, $grantPass)
    {
        $method = 'AES-256-CBC';

        $key = hash('sha256', $grantPass, true);

        $base64Token = strtr($token, ['-' => '+', '_' => '/']);
        $padding = strlen($base64Token) % 4;
        if ($padding) {
            $base64Token .= str_repeat('=', 4 - $padding);
        }
        $data = base64_decode($base64Token);
        $ivLength = openssl_cipher_iv_length($method);
        $iv = substr($data, 0, $ivLength);
        $encrypted = substr($data, $ivLength);
        return openssl_decrypt($encrypted, $method, $key, 0, $iv);
    }

    public function confirmBroadcastAuth($toks)
    {
        $revoked = Http::post('https://p2p.ratefy.co/users/confirm-auth', [
            'token' => $toks
        ]);

        return $revoked->status();
    }


    public function apiUserRegistration(Request $request)
    {
        $user = new User();

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->username = $request->username;
        $user->type     = 4;
        $user->blocked  = 0;
        $user->direct_publish   = 0;
        $user->mobile_number    = $request->mobile_number;
        $user->emailcode        = $request->emailcode;
        $user->activate         = 0;
        $user->active_status    = 0;
        $user->avatar           = 'avatar.png';
        $user->dark_mode        = 0;
        $user->messenger_color  = '#2180f3';
        $user->uuid             = $request->uuid;

        $user->save();

        $state = $this->updatePeerToPeer(uuid: $request->uuid);
        if ($state === 200) {
            return response()->json(200);
        }
    }

    public function updatePeerToPeer($uuid)
    {
        $getData = User::where('uuid', $uuid)->first();

        $state = Http::post('https://p2p.ratefy.co/users/update-from-express', [
            'exp_id' => $getData->id,
            'uuid'  => $uuid
        ]);

        return $state->status();
    }


    public function apiverifyUser(Request $request)
    {
        $user = new User();
        $user->where('id', $request->exp_id)->update([
            'email_verified_at' => Carbon::now(),
            'activate'          => 1
        ]);
    }


    public function apiLogout(Request $request)
    {
        $user = User::where('uuid', $request->uuid)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }


        Auth::loginUsingId((int)$user->id, remember: true);
        Auth::logout();
       

        // return response()->json(['error' => 'Unauthorized logout attempt'], 403);
    }
}
