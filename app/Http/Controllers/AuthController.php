<?php

namespace App\Http\Controllers;

// use auth;
use Carbon\Carbon;
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

use Illuminate\Validation\Validator;
use App\Models\InitiateCommission;
use App\Models\CounterPartyAccount;
use App\Mail\ChatNotify;
use App\Models\HowToVid;
use App\Models\Rateswitch;

use App\Models\AffiliateWithdrawals;
use App\Models\CompetitorRate;
use App\Models\AdminPaymentActivity;
use App\Models\FailedTransaction;
use App\Models\SecurityOtp;
use App\Models\GetVisitor;
use App\Models\BusinessProfile;
use App\Models\UserVerification;
use App\Mail\CancelTransaction;
use App\Mail\CommissionReward;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use App\Models\ExpressTransactionChat;
use Illuminate\Support\Facades\Storage;
use App\Models\MerchantTransactionActivity;
use App\Notifications\TransactionNotification;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Notifications\EndTransactionNotification;
use App\Notifications\StartTransactionNotification;
use Jenssegers\Agent\Facades\Agent;

class AuthController extends Controller
{
    //
    const BASEPATH = 1;

    public function __construct() {
        if(Auth::user()){
            if(auth()->user()->type == 4){
                Auth::guard('web')->logout();
                return redirect()->route('users.login');
            }
        }  
    }
    
    public function home() {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('home');
        }       
    }

    public function first_index(Request $request){
        $ip = getenv("REMOTE_ADDR");
        $getVisitor = $this->getVisited($ip);
        if($getVisitor == true)
        {
            return view('index');
        }
        else 
        {
            return view('index');
        }
 

    }

    public function getVisited($ip){
        $visitors = new GetVisitor();
        $visitors->ip = $ip;
        $visitors->browser = Agent::browser() .'--checks for desktop too--'.Agent::isDesktop();
        $visitors->version = Agent::version(Agent::browser());
        $visitors->is_mobile = Agent::isMobile();
        $visitors->is_tablet = Agent::isTablet();
        $visitors->is_phone = Agent::isPhone();
        $visitors->is_robot = Agent::isRobot();
        $visitors->platform = Agent::platform();
        $visitors->device = Agent::device();
        if($visitors->save()){
            return true;
        }else {
            return false;
        }
    }

    public function index(Request $request) {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.home');
        }
        
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token = null){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            $data = [
                'pageTitle' => 'Reset Password',
            ];
            return view('back.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
        }
        
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
            'featured_image'    => 'required|mimes:jpeg,jpg,png|max:1024',
            'post_tags'         => 'nullable|string' 
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
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
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


        
    }

    public function updatePost(Request $request){
        if( $request->hasFile('featured_image') )
        {
            $request->validate([
                'post_title'        => 'required|unique:posts,post_title,'.$request->post_id,
                'post_content'      => 'required',
                'post_category'     => 'required|exists:sub_categories,id',
                'featured_image'    => 'required|mimes:jpeg,jpg,png|max:1024',
                'post_tags'         => 'nullable|string'  
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
                'post_tags'     => 'nullable|string' 
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
            'exchange_image'                => 'required|mimes:jpeg,jpg,png|max:1024',
            'name'                          => 'required',
            'percentage'                    => 'required|numeric',
            'sub_item'                      => 'required|string',
            'labels'                        => 'required|string',
            'currency'                      => 'required|string',
            'seller_note'                   => 'required|string',
            'inner_seller_note'             => 'required|string',
            'confirmation_note'             => 'required|string',
            'duration'                      => 'required|string',
            'duration_cap'                  => 'required|string',
            'price_from'                    => 'required|string',
            'price_to'                      => 'required|string',
            'whatsapp'                      => 'nullable|string',
            'google_form'                   => 'nullable|string'
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
            $addData->labels                        = $request->labels;
            $addData->currency                      = $request->currency;
            $addData->seller_note                   = $request->seller_note;
            $addData->inner_seller_note                   = $request->inner_seller_note;
            $addData->confirmation_note             = $request->confirmation_note;
            $addData->duration_cap                  = $request->duration_cap;
            $addData->duration                      = $request->duration;
            $addData->price_from                    = $request->price_from;
            $addData->price_to                      = $request->price_to;
            $addData->google_form                   = $request->google_form ?? null;
            $addData->whatsapp                      = $request->whatsapp ?? null;
            $addData->image_path                    = $new_filename;
            $addData->active                        = 1;
            

            $isSaved = $addData->save();

            if($isSaved){
                return response()->json(['code' => 1, 'msg' => 'Payment option has been successfully added']);
            }else{
                return response()->json(['code' => 3, 'msg' => 'Oops, something went wrong']);
            }
        }
    }


    public function editExchnageItem($id){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.edit-exchange-item', ['item' => ExchangeItem::find($id)]);
        }

        
    }

    public function editPaymentOption(Request $request){

        if( $request->hasFile('exchange_image') )
        {
            $request->validate([
                'id'                            => 'required',
                'name'                          => 'required',
                'percentage'                    => 'required|numeric',
                'sub_item'                      => 'required|string',
                'labels'                        => 'required|string',
                'currency'                      => 'required|string',
                'seller_note'                   => 'required|string',
                'inner_seller_note'             => 'required|string',
                'confirmation_note'             => 'required|string',
                'duration_cap'                  => 'required',
                'duration'                      => 'required|string',
                'price_from'                    => 'required|string',
                'price_to'                      => 'required|string',
                'whatsapp'                      => 'nullable|string',
                'google_form'                   => 'nullable|string'
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
                    $old_exchange_image = Post::find($request->id);
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
                    $editData->currency                      = $request->currency;
                    $editData->seller_note                   = $request->seller_note;
                    $editData->inner_seller_note                   = $request->inner_seller_note;
                    $editData->confirmation_note             = $request->confirmation_note;
                    $editData->duration_cap            = $request->duration_cap;
                    $editData->duration              = $request->duration;
                    $editData->price_from            = $request->price_from;
                    $editData->price_to              = $request->price_to;
                    $editData->google_form           = $request->google_form;
                    $editData->whatsapp              = $request->whatsapp;
                    $editData->image_path       = $new_filename;
                    $saved = $editData->save();

                    if( $saved ){
                        return back();
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
                'id'                            => 'required',
                'name'                          => 'required',
                'percentage'                    => 'required|numeric',
                'sub_item'                      => 'required|string',
                'labels'                        => 'required|string',
                'currency'                      => 'required|string',
                'seller_note'                   => 'required|string',
                'inner_seller_note'             => 'required|string',
                'confirmation_note'             => 'required|string',
                'duration_cap'                  => 'required',
                'duration'                      => 'required|string',
                'price_from'                    => 'required|string',
                'price_to'                      => 'required|string',
                'whatsapp'                      => 'nullable|string',
                'google_form'                   => 'nullable|string'
            ]);

            
            $editData = ExchangeItem::find($request->id);
            $editData->item                         = $request->name;
            $editData->percntage                    = $request->percentage;
            $editData->sub_item                     = $request->sub_item;
            $editData->labels                       = $request->labels;
            $editData->currency                     = $request->currency;
            $editData->seller_note                  = $request->seller_note;
            $editData->inner_seller_note            = $request->inner_seller_note;
            $editData->confirmation_note            = $request->confirmation_note;
            $editData->duration_cap                 = $request->duration_cap;
            $editData->duration                     = $request->duration;
            $editData->price_from                   = $request->price_from;
            $editData->price_to                     = $request->price_to;
            $editData->google_form                  = $request->google_form;
            $editData->whatsapp                     = $request->whatsapp;
            $saved = $editData->save();
           
            if($saved){
                return back();
            }else{
                return back();
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
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            $getamount = Http::withHeaders([
                'accept' => 'application/json',
                'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80',
                'Content-Type' => 'application/json'
            ])->get('https://api.getanchor.co/api/v1/accounts/balance/16899293950757-anc_acc');
            $newamount = $getamount->object();
            if($request->id){
                $notification = ExpressTransaction::where('order_id', $request->id)->first();
                return view('back.pages.author-admin.chat', ['transaction' => $notification, 'anchor_amount' => $newamount->data->availableBalance]);
            }else{
                return view('back.pages.author-admin.chat', ['anchor_amount' => $newamount->data->availableBalance]);
            }
        }

           
    }

    public function cancelledTransaction(Request $request){

        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            if($request->id){
                $notification = ExpressTransaction::where('order_id', $request->id)->first();
                return view('back.pages.author-admin.closed-transactions', ['transaction' => $notification]);
            }else{
                return view('back.pages.author-admin.closed-transactions');
            }
        }

           

    }

    public function processingTransaction(Request $request){

        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            if($request->id){
                $notification = ExpressTransaction::where('order_id', $request->id)->first();
                return view('back.pages.author-admin.process-transaction', ['transaction' => $notification]);
            }else{
                return view('back.pages.author-admin.process-transaction');
            }
        }

           

    }

    public function successTransaction(Request $request){

        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            if($request->id){
                $notification = ExpressTransaction::where('order_id', $request->id)->first();
                return view('back.pages.author-admin.success-transaction', ['transaction' => $notification]);
            }else{
                return view('back.pages.author-admin.success-transaction');
            }
        }

           

    }
    
    
    public function sitemap(){
        return view('sitemap');
    }

    public function transactions(Request $request, $id){

        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            $currentTransaction = Transaction::where('transaction_id', $id)->first();
            return view('back.pages.transactions', [
                'transactions'  => $currentTransaction
            ]);
        }
        
        
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

    public function expressTransactionMessagesHistory(Request $request){
        $request->validate([
            'session_id'    => 'required'
        ]);

        $grapChat =  ExpressTransactionChat::where('session_id', $request->session_id)->get();
        return response()->json(['message' => $grapChat], 200);

    }

    public function cancelPayment(Request $request) {
        $update = ExpressTransaction::where('order_id', $request->session)->update(['transaction_status' =>  'closed']);
        $name = ExpressTransaction::where('order_id', $request->session)->first();
        $user = User::find($name->seller_id);
        Mail::to($user)->send(new CancelTransaction($name->seller_name, $request->session,  Carbon::now()));
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
                $this->validateComission($request->id, $request->session);
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

    
    public function validateComission($id, $session) {
        $getId = User::find($id);
        $check = InitiateCommission::where('from_uuid', $getId->uuid)->where('session', $session)->first(); 
        if($check)
        {
            Http::post('https://affiliatebased.ratefy.co/api/get-reward-from-customer', [
                'amount'    => $check->amount,
                'uuid'      => $check->from_uuid
            ]);
            InitiateCommission::where('from_uuid', $getId->uuid)->where('session', $session)->update([
                'status' => 'sent'
            ]);
        }
    }
    // 8888888888888888888888888888
    
    public function payout (Request $request)
    {
        $valid = $request->validate([
            'session'   => 'required',
            'account'   => 'required',
            'finger'    => 'required'
        ]);
        
        $this->getAdmin($request->session);
        if($valid) {
            
            $otpSent = $this->otp($request->session, $request->account, $request->finger);
            if($otpSent == true){
                
                return  response()->json(['message' => 'success'], 200);
            }
        }
           
    }

    public function getAdmin($session) {

        $getTransact =  ExpressTransaction::where('order_id', $session)->first();
       
        $adminActivity = new AdminPaymentActivity();
        $adminActivity->users_id = auth()->user()->id;
        $adminActivity->amount = $getTransact->conversion_amount;
        $adminActivity->transaction_session_id = $session;
        $adminActivity->save();
    }


    public function otpConfirm(Request $request)
    {
        $confirm = SecurityOtp::where('otp', $request->passcode)->where('complete', 0)->update([
            'complete'  => 1
        ]);

        if($confirm)
        {
            $getData = ExpressTransaction::where('order_id', $request->sessionId)->first();
            $payloadData = CounterPartyAccount::where('account_number', $getData->seller_account_number)->where('bank_name', $getData->seller_bank_name)->first();
            $transaction_reference = Str::uuid()->toString();

            $payload = [
                "data"   => [ "type"  => "NIPTransfer", "attributes" => [
                                                                            "amount" => (int)$getData->conversion_amount * 100,
                                                                            "currency" => "NGN",
                                                                            "reason" => "PAYOUT",
                                                                            "reference" => $transaction_reference
                                                                        ],  "relationships" => [ "account" => [ "data" => [ "id" => "16899293950757-anc_acc", "type" => "DepositAccount" ]],
                                                                                                "counterParty" => [ "data" =>  [ "id" => $payloadData->uuid, "type" => "CounterParty"]]]]];

            $accertain = ExpressPayoutHistory::where('session_id', $request->sessionId)->first();
    
            if($accertain !== null)
            {
                $message = 'paid already';
                event(new ExpressPayEvent($message, Auth::user(), $request->session));
                return response()->json([
                    'message' => 'transaction completed already',
                ], 208);
                    
            }
            else
            {
               
                    $response = Http::withHeaders([
                    'accept' => 'application/json',
                    'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80',
                    'Content-Type' => 'application/json'
                    ])->post('https://api.getanchor.co/api/v1/transfers', $payload);

                    if($response->status() == 200)
                    {
                        $status = $response->object();
                        $makeManualPay  = new ExpressPayoutHistory();
                        $makeManualPay->tx_ref              = $transaction_reference;
                        $makeManualPay->amount              = $getData->conversion_amount;
                        $makeManualPay->bank                = $getData->seller_bank_name;
                        $makeManualPay->account_number      = $getData->seller_account_number;
                        $makeManualPay->recipient_name      = $getData->seller_account_name;
                        $makeManualPay->recipient_code      = 'GetAnchor-payment--'.$status->data->attributes->reference;
                        $makeManualPay->channel             = 'GETANCHOR';
                        $makeManualPay->status              = $statusTrue = $status->data->attributes->status == 'FAILED' ? 'fail': 'pending';
                        $makeManualPay->session_id          = $request->sessionId;
                        $inserted = $makeManualPay->save();
    
                        if($inserted)
                        {
                            if($status['status'] == true)
                            {
                                $message = 'paid';
                                event(new ExpressPayEvent($message, Auth::user(), $request->sessionId));
                            }
                            $statar = $status['status'] == true ? 'success' : 'failure';
                            ExpressTransaction::where('order_id', $request->sessionId)->update([
                                'transaction_status'                => $statar,
                                'buyer_disbursment_confirmation'    => 1
                            ]);
                            event(new ChatMessageEvent($paidMessage, Auth::user(), $request->sessionId));
                            $bank = ['account' => $getData->seller_account_name, 'number' => $getData->seller_account_number, 'bank' => $getData->seller_bank_name];
                            $payingUser = User::find($getData->seller_id);
                            $this->validateComission($getData->seller_id, $request->session);
                            Mail::to($payingUser)->send($payingUser->name, $getData->conversion_amount, $getData->order_id, $bank);
                            $status = $response->object();
                            return response()->json([
                                'status' =>  $status->data->attributes->status,
                                'reference' =>  $status->data->attributes->reference,
                                'amount' =>  $status->data->attributes->amount,
                                'created' =>  $status->data->attributes->createdAt,
                                'currency' =>  $status->data->attributes->currency,
                            ], 200);
                        }
                    }
                    elseif($response->status() == 403)
                    {
                        $status = $response->object();
                        return response()->json([
                            'title' =>  $status->errors[0]->title,
                            'status' =>  $status->errors[0]->status,
                            'detail' =>  $status->errors[0]->detail,
                        ], 403);
                    }
                    elseif($response->status() == 201) 
                    {
                        $status = $response->object();

                        $makeManualPay  = new ExpressPayoutHistory();
                        $makeManualPay->tx_ref              = $transaction_reference;
                        $makeManualPay->amount              = $getData->conversion_amount;
                        $makeManualPay->bank                = $getData->seller_bank_name;
                        $makeManualPay->account_number      = $getData->seller_account_number;
                        $makeManualPay->recipient_name      = $getData->seller_account_name;
                        $makeManualPay->recipient_code      = 'GetAnchor-payment--'.$status->data->attributes->reference;
                        $makeManualPay->channel             = 'GETANCHOR';
                        $makeManualPay->status              = $statusTrue = $status->data->attributes->status == 'FAILED' ? 'fail': 'pending';
                        $makeManualPay->session_id          = $request->sessionId;
                        $makeManualPay->transact_rfx        = $status->data->id;
                        $inserted = $makeManualPay->save();
    
                        if($inserted)
                        {
                            
                            $message = 'Payment sent';
                            event(new ExpressPayEvent($message, Auth::user(), $request->sessionId));

                            ExpressTransaction::where('order_id', $request->sessionId)->update([
                                'transaction_status'                => 'success',
                                'buyer_disbursment_confirmation'    => 1
                            ]);

                            $bank = ['account' => $getData->seller_account_name, 'number' => $getData->seller_account_number, 'bank' => $getData->seller_bank_name];
                            $payingUser = User::find($getData->seller_id);
                            Mail::to($payingUser)->send(new PaymentDisbursement($payingUser->name, $getData->conversion_amount, $getData->order_id, $getData->seller_account_name, $getData->seller_account_number, $getData->seller_bank_name));
                            $status = $response->object();
                            return response()->json([
                                'status'        =>  $status->data->attributes->status,
                                'reference'     =>  $status->data->attributes->reference,
                                'amount'        =>  $status->data->attributes->amount,
                                'created'       =>  $status->data->attributes->createdAt,
                                'currency'      =>  $status->data->attributes->currency,
                                'fullobject'    =>  $status
                            ], 201);
                        }

                    }elseif($response->status() == 400){
                        $status = $response->object();
                            return response()->json([
                                'message' =>  $status,
                            ], 400);
                    }
                
            }
    
        }
    }


    public function otp($session, $account, $fingerprint){
        $six_digit_random_number = random_int(100000, 999999);
        $optCode = $six_digit_random_number;

        $admin = auth()->user()->id;
        $adminDetails = User::find(auth()->user()->id);

        $securityOpt = new SecurityOtp();
        $securityOpt->user_id       =   $admin; 
        $securityOpt->name          =   $adminDetails->name;
        $securityOpt->email         =   $adminDetails->email;
        $securityOpt->number        =   $adminDetails->mobile_number;
        $securityOpt->type          =   $adminDetails->type;
        $securityOpt->otp           =   $optCode;
        $securityOpt->session       =   $session;
        $securityOpt->account       =   $account;
        $securityOpt->fingerprint   =   $fingerprint;
        $securityOpt->mac           =   apache_getenv("SERVER_ADDR");
        $securityOpt->ip            =   getenv("REMOTE_ADDR");

        $payload = [
            'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
            'to'        => '+2347045489688',
            'from'      => 'N-Alert',
            'sms'       => 'Dear Ratefy Admin, your authentication code ' .$optCode. '.  Do not share.',
            'type'      => 'plain',
            'channel'   => 'dnd'
        ];

        if($securityOpt->save()) {

            Http::post('https://api.ng.termii.com/api/sms/send', [
                'from'  => 'N-Alert',
                'to'    => '+2347045489688',
                'sms'   => 'Dear Ratefy Admin, your authentication code ' .$optCode. '. Do not share',
                'type'  => 'plain',
                'channel' => 'dnd',
                'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
            ]);

            return true;
        }else{
            return false;
        }

    }




   public function retrieveUserBank($id, $account){
        $getBank =  BankUser::where('users_id', $id)->where('account_number', $account)->first();
        return $getBank;
   }


    public function transactionDetail(Request $request)
    {

        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            ChatSubscription::where('session_id', $request->id)->update(['status' => 'attended']);
            $getDetail = ExpressTransaction::where('order_id', $request->id)->first();

            $seller = User::find($getDetail->seller_id);
            $buyer = User::find($getDetail->buyer_id);
            $address = UserProfileAddress::where('users_id', $getDetail->seller_id)->first();
            $banks = CounterPartyAccount::where('users_id', $getDetail->seller_id)->where('account_number',  $getDetail->seller_account_number)->first();
            $exchangeItems = ExchangeItem::where('id', $getDetail->wallet_id)->first();
            $userVerification   = UserVerification::where('users_id', $getDetail->seller_id)->first();
            $userBusinessProfile = BusinessProfile::where('users_id', $getDetail->seller_id)->first();
                      
            return view('back.pages.express-transaction-detail', 
                        [
                            'detail'            => $getDetail, 
                            'seller'            => $seller, 
                            'buyer'             => $buyer, 
                            'address'           => $address, 
                            'banks'             => $banks, 
                            'xitem'             => $exchangeItems,
                            'userverify'        => $userVerification,
                            'businessProfile'   => $userBusinessProfile
                        ]);
        }
        
    }

    public function dispatchNotifier(Request $request) {

        $getUser = ExpressTransaction::where('order_id', $request->message)->first();
        $user = User::find($getUser->seller_id);

        Mail::to($user)->send(new ChatNotify($user->name));
    }



    public function failedPayout(Request $request) {
        $valid = $request->validate([
            'session'   => 'required',
            'account'   => 'required',
            'finger'    => 'required'
        ]);

        if($valid) {
            $otpSent = $this->failedTransactionOtp($request->session, $request->account, $request->finger);
            if($otpSent == true){
                $this->getAdmin($request->session);
                return  response()->json(['message' => 'success'], 200);
            }
        }
    }

    public function failedTransactionOtp($session, $account, $fingerprint) {
        $six_digit_random_number = random_int(10000000, 99999999);
        $optCode = $six_digit_random_number;

        $admin = auth()->user()->id;
        $adminDetails = User::find(auth()->user()->id);

        $securityOpt = new SecurityOtp();
        $securityOpt->user_id       =   $admin; 
        $securityOpt->name          =   $adminDetails->name;
        $securityOpt->email         =   $adminDetails->email;
        $securityOpt->number        =   $adminDetails->mobile_number;
        $securityOpt->type          =   $adminDetails->type;
        $securityOpt->otp           =   $optCode;
        $securityOpt->session       =   $session;
        $securityOpt->account       =   $account;
        $securityOpt->fingerprint   =   $fingerprint;
        $securityOpt->mac           =   apache_getenv("SERVER_ADDR");
        $securityOpt->ip            =   getenv("REMOTE_ADDR");

        $payload = [
            'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
            'to'        => '+2349134860154',
            'from'      => 'N-Alert',
            'sms'       => $optCode,
            'type'      => 'plain',
            'channel'   => 'dnd'
        ];

        if($securityOpt->save()) {

            Http::post('https://api.ng.termii.com/api/sms/send', [
                'from'  => 'N-Alert',
                'to'    => '+2347045489688',
                'sms'   => 'Dear Ratefy Admin, your authentication code ' .$optCode. '. Do not share',
                'type'  => 'plain',
                'channel' => 'dnd',
                'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
            ]);

            return true;
        }else{
            return false;
        }
    }

    public function failedTransactionOtpConfirm(Request $request) {
        $confirm = SecurityOtp::where('otp', $request->passcode)->where('complete', 0)->update([
            'complete'  => 1
        ]);

        if($confirm)
        {
            $getData = ExpressTransaction::where('order_id', $request->sessionId)->first();
            $payloadData = CounterPartyAccount::where('account_number', $getData->seller_account_number)->where('bank_name', $getData->seller_bank_name)->first();
            $transaction_reference = Str::uuid()->toString();

            $payload = [
                "data"   => [ "type"  => "NIPTransfer", "attributes" => [
                                                                            "amount" => (int)$getData->conversion_amount * 100,
                                                                            "currency" => "NGN",
                                                                            "reason" => "PAYOUT",
                                                                            "reference" => $transaction_reference
                                                                        ],  "relationships" => [ "account" => [ "data" => [ "id" => "16899293950757-anc_acc", "type" => "DepositAccount" ]],
                                                                                                "counterParty" => [ "data" =>  [ "id" => $payloadData->uuid, "type" => "CounterParty"]]]]];

            $accertain = ExpressPayoutHistory::where('session_id', $request->sessionId)->first();
    
            if($accertain !== null)
            {
                if($accertain->transact_rfx == $request->statusId){
                    $response = Http::withHeaders([
                        'accept' => 'application/json',
                        'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80',
                        'Content-Type' => 'application/json'
                        ])->post('https://api.getanchor.co/api/v1/transfers', $payload);
                        if($response->status() == 201)
                        {
                            $status = $response->object();
                            
                            $makeManualPay  = new FailedTransaction();
                            $makeManualPay->express_payout_histories_id = $accertain->id;
                            $makeManualPay->failed_transact_rfx_id   = $request->statusId;
                            $makeManualPay->tx_ref              = $transaction_reference;
                            $makeManualPay->amount              = $getData->conversion_amount;
                            $makeManualPay->bank                = $getData->seller_bank_name;
                            $makeManualPay->account_number      = $getData->seller_account_number;
                            $makeManualPay->recipient_name      = $getData->seller_account_name;
                            $makeManualPay->recipient_code      = 'GetAnchor-payment--'.$status->data->attributes->reference;
                            $makeManualPay->channel             = 'GETANCHOR';
                            $makeManualPay->status              = $statusTrue = $status->data->attributes->status == 'FAILED' ? 'fail': 'pending';
                            $makeManualPay->session_id          = $request->sessionId;
                            $makeManualPay->transact_rfx        = $status->data->id;
                            $inserted = $makeManualPay->save();

                            if($inserted)
                            {
                                
                                $message = 'Payment sent';
                                event(new ExpressPayEvent($message, Auth::user(), $request->sessionId));

                                ExpressTransaction::where('order_id', $request->sessionId)->update([
                                    'transaction_status'                => 'success',
                                    'buyer_disbursment_confirmation'    => 1
                                ]);

                                $bank = ['account' => $getData->seller_account_name, 'number' => $getData->seller_account_number, 'bank' => $getData->seller_bank_name];
                                $payingUser = User::find($getData->seller_id);
                                Mail::to($payingUser)->send(new PaymentDisbursement($payingUser->name, $getData->conversion_amount, $getData->order_id, $getData->seller_account_name, $getData->seller_account_number, $getData->seller_bank_name));
                                $status = $response->object();
                                return response()->json([
                                    'status'        =>  $status->data->attributes->status,
                                    'reference'     =>  $status->data->attributes->reference,
                                    'amount'        =>  $status->data->attributes->amount,
                                    'created'       =>  $status->data->attributes->createdAt,
                                    'currency'      =>  $status->data->attributes->currency,
                                ], 201);
                            }
                        }

                }else {
                    return response()->json([
                        'message' => 'not matched',
                    ], 201);
                }
               
            }
            else
            {
               $message = 'You don\'t have any failed transaction yet';
                event(new ExpressPayEvent($message, Auth::user(), $request->session));
                return response()->json([
                    'message' => 'transaction completed already',
                ], 208);
 
            }
    
        }
    }

    public function competition(Request $request) 
    {
        $request->validate([
            'name'              => 'required|string',
            'withdrawl_fee'     => 'required',
            'conversion_fee'    => 'required',
            'service_fee'       => 'required'
        ]);

        CompetitorRate::create([
            'name'              => $request->name,
            'withdraw_in_fee'   => $request->withdrawl_fee,
            'conversion_fee'    => $request->conversion_fee,
            'service_fee'       => $request->service_fee
        ]);

        return back();
    }


    public function commissionsOtp(Request $request){
        $six_digit_random_number = random_int(100000, 999999);
        $optCode = $six_digit_random_number;

        $admin = auth()->user()->id;
        $adminDetails = User::find(auth()->user()->id);

        $securityOpt = new SecurityOtp();
        $securityOpt->user_id       =   $admin; 
        $securityOpt->name          =   $adminDetails->name;
        $securityOpt->email         =   $adminDetails->email;
        $securityOpt->number        =   $adminDetails->mobile_number;
        $securityOpt->type          =   $adminDetails->type;
        $securityOpt->otp           =   $optCode;
        $securityOpt->session       =   $request->session;
        $securityOpt->account       =   $request->account;
        $securityOpt->fingerprint   =   $request->finger;
        $securityOpt->mac           =   apache_getenv("SERVER_ADDR");
        $securityOpt->ip            =   getenv("REMOTE_ADDR");

        $payload = [
            'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
            'to'        => '+2347045489688',
            'from'      => 'N-Alert',
            'sms'       => 'Dear Ratefy Admin, your authentication code ' .$optCode. '. Do not share',
            'type'      => 'plain',
            'channel'   => 'dnd'
        ];

        if($securityOpt->save()) {
 
            Http::post('https://api.ng.termii.com/api/sms/send', [
                'from'  => 'N-Alert',
                'to'    => '+2349134860154',
                'sms'   =>  'Dear Ratefy Admin, your authentication code ' .$optCode. '. Do not share',
                'type'  => 'plain',
                'channel' => 'dnd',
                'api_key'   => 'TLN6WXNS4VtM5n08puP15RPhsZhDRfyH64Ybi47mEkG5dFyQQ7DtCnYpk4eNk4',
            ]);

            return true;
        }else{
            return false;
        }

    }

    public function commissionConfirmOtp(Request $request)
    {
        $confirm = SecurityOtp::where('otp', $request->passcode)->where('complete', 0)->update([
            'complete'  => 1
        ]);

        if($confirm)
        {
            $transaction_reference = Str::uuid()->toString();
            $payload = [
                "data"   => [ 
                    "type"  => "NIPTransfer", 
                    "attributes" => [
                        "amount" => (int)$request->amount * 100,
                        "currency" => "NGN",
                        "reason" => "PAYOUT",
                        "reference" => $request->session
                    ],  
                    "relationships" => [ 
                        "account" => [ 
                            "data" => [ 
                                "id" => "16899293950757-anc_acc", 
                                "type" => "DepositAccount" ]
                            ],
                            "counterParty" => [ 
                                "data" =>  [ 
                                    "id" => $request->bank_uuid, 
                                    "type" => "CounterParty"
                                    ]
                                ]
                            ]
                        ]
                    ];

                    // $bank = ['account' => $request->account_name, 'number' => $request->account_number, 'bank' => $request->account_name];
                    $payingUser = User::find($request->users_id);
                    Mail::to($payingUser)->send(new CommissionReward($payingUser->name, $request->amount,  $request->account_name, $request->account_number, $request->bank_name));
                    AffiliateWithdrawals::where('approval', $request->session)->update(['status' => 'paid']);
                    Http::post('https://affiliatebased.ratefy.co/api/withdrawal-update', [
                        'approval' => $request->session,
                        'status' => 'paid'
                    ]);
                    // $status = $response->object();
                    return response()->json([
                        'status'    => 'sent'
                        // 'status'        =>  $status->data->attributes->status,
                        // 'reference'     =>  $status->data->attributes->reference,
                        // 'amount'        =>  $status->data->attributes->amount,
                        // 'created'       =>  $status->data->attributes->createdAt,
                        // 'currency'      =>  $status->data->attributes->currency,
                        // 'fullobject'    =>  $status
                    ], 201);

                    // $response = Http::withHeaders([
                    // 'accept' => 'application/json',
                    // 'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80',
                    // 'Content-Type' => 'application/json'
                    // ])->post('https://api.getanchor.co/api/v1/transfers', $payload);

                    // if($response->status() == 201) 
                    // {
                    //     $status = $response->object();

                    //     $makeManualPay  = new ExpressPayoutHistory();
                    //     $makeManualPay->tx_ref              = $transaction_reference;
                    //     $makeManualPay->amount              = $request->amount;
                    //     $makeManualPay->bank                = $request->bank_name;
                    //     $makeManualPay->account_number      = $request->account_number;
                    //     $makeManualPay->recipient_name      = $request->account_name;
                    //     $makeManualPay->recipient_code      = 'Commission-Reward-GetAnchor-payment--'.$status->data->attributes->reference;
                    //     $makeManualPay->channel             = 'GETANCHOR';
                    //     $makeManualPay->status              = $statusTrue = $status->data->attributes->status == 'FAILED' ? 'fail': 'pending';
                    //     $makeManualPay->session_id          = $request->session;
                    //     $makeManualPay->transact_rfx        = $status->data->id;
                    //     $inserted = $makeManualPay->save();
    
                    //     if($inserted)
                    //     {

                    //         $bank = ['account' => $request->account_name, 'number' => $request->account_number, 'bank' => $request->account_name];
                    //         $payingUser = User::find($request->users_id);
                    //         Mail::to($payingUser)->send(new CommissionReward($payingUser->name, $request->amount,  $request->account_name, $request->account_number, $request->bank_name));
                    //         $status = $response->object();
                    //         return response()->json([
                    //             'status'        =>  $status->data->attributes->status,
                    //             'reference'     =>  $status->data->attributes->reference,
                    //             'amount'        =>  $status->data->attributes->amount,
                    //             'created'       =>  $status->data->attributes->createdAt,
                    //             'currency'      =>  $status->data->attributes->currency,
                    //             'fullobject'    =>  $status
                    //         ], 201);
                    //     }
                    // }
                    // elseif($response->status() == 403)
                    // {
                    //     $status = $response->object();
                    //     return response()->json([
                    //         'title' =>  $status->errors[0]->title,
                    //         'status' =>  $status->errors[0]->status,
                    //         'detail' =>  $status->errors[0]->detail,
                    //     ], 403);
                    // }
                    // elseif($response->status() == 400){
                    //     $status = $response->object();
                    //         return response()->json([
                    //             'message' =>  $status,
                    //         ], 400);
                    // }
                

    
        }
    }

    

    public function validateCommision(Request $request) 
    {
        $response = $this->sendValidate($request->amount, $request->uuid, $request->approval);
        $gotResponse = $response->object();
        if($gotResponse->status == 'success')
        {
            $bank = CounterPartyAccount::where('uuid', $request->uuid)->first();
            return view('back.pages.pay-commissions', ['approval' => $request->approval, 'amount' => $request->amount, 'bank_uuid' => $request->uuid, 'bank' => $bank]);
        }else{
            return back();
        }
 
    }

    public function sendValidate($amount, $uuid, $approval)
    {
        return Http::post('https://affiliatebased.ratefy.co/api/validate-withdrawal', [
            'amount'    => $amount,
            'uuid'      => $uuid,
            'approval'  => $approval
        ]);
    }

    public function competitionDelete(Request $request)
    {
        CompetitorRate::find($request->id)->delete();
        return back();
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }


    public function authorProfile()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.profile'); 
        }
    }

    public function authorAuthors()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.authors'); 
        }
    }

    public function authorCategories()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.categories'); 
        }
    }

    public function authorExchangeItems()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.exchange-item'); 
        }
    }

    public function authorSetLabels()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.set-labels'); 
        }
    }


    public function authorSettings()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.settings'); 
        }
    }


    public function authorAddPost()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.add-post'); 
        }
    }


    public function authorAllPost()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.all_posts'); 
        }
    }


    public function authorPosts()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.posts'); 
        }
    }




    public function dashboard(){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('dashboard'); 
        }
        
    }

    public function commission(){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.commission'); 
        }
        
    }

    public function activeExchange(){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('active-dashboard');
        }
       
    }

    public function pastExchange(){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('past-dashboard');
        }
        
    }

    public function bankAccount()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('bank-account');
        }
        
    }

    public function profile()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('profile');
        }
        
    }

    public function profileEdit()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('profile-edit');
        }
        
    }

    public function delRequest()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('delivery-request');
        }
        
    }

    public function newCalculator()
    {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('new-calculator');
        }
        
    }

    public function emails() {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('emails');
        }  
    }

    public function verifiedUsers() {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            return view('back.pages.verify-users');
        }
    }

    public function verifiedUser($id){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            $takeMage = UserVerification::where('users_id', $id)->first();
            return view('back.pages.verify-check', ['mage' => $takeMage]);
        }
    }

    public function verifiedDeny($id) {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            UserVerification::where('users_id', $id)->update(['status' => 'denied']);
            $location = '/author/verify-users/'.$id;
            return redirect($location);
        }
    }

    public function competitorStats(){
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
            $getData = CompetitorRate::all();
            if($getData->isNotEmpty()){
                return view('back.pages.competitors', ['comps' => $getData]);
            }else {
                return view('back.pages.competitors');
            }
            
        }
    }

    public function verifiedApprove($id) {
        if(auth()->user()->type == 4){
            Auth::guard('web')->logout();
            return redirect()->route('users.login');
        }else {
             UserVerification::where('users_id', $id)->update(['status' => 'approved']);
             $location = '/author/verify-users/'.$id;
            return redirect($location);
        }
    }

    public function howToVids() {
        return view('back.pages.howtovid');
    }

    public function createYoutubeVideo(Request $request) {
        $request->validate([
            'links'                 => 'required|string',
            'title'                 => 'required|string',
            'description'           => 'nullable|string',
        ]);

        $createVideo = new HowToVid();

        $createVideo->link         = $request->links;
        $createVideo->title         = $request->title;
        $createVideo->slug          = $this->createUrlSlug($request->title);
        $createVideo->description   = $request->description ?? null;
        
        $saved = $createVideo->save();

        if($saved){
            return back()->with('success', 'successful upload of the Youtube video.');
        }
    }

    function createUrlSlug($urlString)
    {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
        return $slug;
    }


    function getStatus($any) {
       
        $account =  ExpressTransaction::where('order_id', $any)->first();
        $history = ExpressPayoutHistory::where('session_id', $any)->first();
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'x-anchor-key' => 'n5dXM.fb34ce2039d491d7576da435f680881c720aac7be0bc92d5d45eba221467f732111dc66e06eaed1c5b3370487f437ce5bf80',
            'Content-Type' => 'application/json'
            ])->get('https://api.getanchor.co/api/v1/transfers/'.$history->transact_rfx);
            return view('back.pages.getpay-detail', ['status' => $response->object(), 'user' => $account, 'history' => $history]);    
    }

    public function affiliateWithdrawal(Request $request)
    {
        $status =  AffiliateWithdrawals::create([
                        'uuid'      => $request->uuid,
                        'amount'    => $request->amount,
                        'approval'  => $request->approval
                    ]);
        return response()->json([
            'status' => $status
        ]);

    }


    public function rateSwitch(Request $request) {

        $validation = Validator::make($request->all(), [
            'id'        => ['required'],
            'status'    => ['required', 'string']
        ]);

        if($validation->fails()) {
            return response()->json(['status' => 'success']);
        }

        Rateswitch::where()->update([
            'status' => $request->status
        ]);

    }
    
}
