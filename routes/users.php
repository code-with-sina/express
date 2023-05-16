<?php

use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

Route::prefix('users')->name('users.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'back.pages.seller_auth.login')->name('login');
        Route::view('/register', 'back.pages.seller_auth.register')->name('register');
        Route::get('/activate/{req}', [UsersController::class, 'activate'])->name('activate');
        Route::view('/forgot-password', 'back.pages.seller_auth.forgot')->name('forgot-password');
        Route::get('/password/reset/token', [UsersController::class, 'ResetForm'])->name('reset-form');
    });


    Route::middleware(['auth:web'])->group(function(){
        Route::view('/profile', 'back.pages.users.profile')->name('profile');
        Route::view('/profile/detail', 'back.pages.users.profile-edit-detail')->name('profile.detail');
        Route::view('/profile/address', 'back.pages.users.profile-edit-address')->name('profile.address');
        Route::view('/bank', 'back.pages.users.bank-account')->name('bank');
        Route::view('/bank/edit', 'back.pages.users.bank-account-edit')->name('bank.edit');
        
        Route::get('/calculate', [UsersController::class, 'caluculator'])->name('calculator');
        Route::view('/mobile-calculate', 'back.pages.users.mobile-calculate')->name('mobile-calculator');
        
        Route::view('/verification', 'back.pages.users.verification')->name('verification');
        Route::get('/buzprofile', [UsersController::class, 'buzprofile'])->name('buzprofile');
        Route::get('/edit-buzprofile', [UsersController::class, 'editBuzprofile'])->name('edit-buzprofile');

        Route::view('/activity', 'back.pages.users.activity')->name('activities');
        Route::view('/success-activity', 'back.pages.users.success-activity')->name('success-activities');
        Route::post('/sell', [UsersController::class, 'sellOut'])->name('sell');
        Route::get('/transactions/{transactions}', [UsersController::class, 'transactions'])->name('transactions');
        
        Route::post('/express/transaction', [UsersController::class, 'expressTransaction']);
        Route::get('/express-transaction', [UsersController::class, 'expressTransactionActivity']);
        Route::get('/mobile/express-transaction', [UsersController::class, 'mobileExpressTransactionActivity']);
        Route::get('/whatsapp/',[UsersController::class, 'whatsapp'])->name('whatsapp');
        
        Route::get('/express/awaiting-confirmation', [UsersController::class, 'awaitingConfirmation']);
        Route::get('/express/complete-transaction', [UsersController::class, 'completeTransaction']);
        Route::post('/express/transaction/chat', [UsersController::class, 'expressTransactionMessages']);
        Route::post('/express/transaction/chat/history', [UsersController::class, 'expressTransactionMessagesHistory']);
        
        Route::post('/buzprofiles', [UsersController::class, 'businessProfileCreate'])->name('buzprofiles');
        

        // Route::view('/authors', 'back.pages.authors')->name('authors');
        // Route::view('/categories', 'back.pages.categories')->name('categories');
        // Route::view('/exchange-item','back.pages.exchange-item')->name('exchange-item');
        // Route::get('/edit-exchange-item/{any}', [AuthController::class, 'editExchnageItem'])->name('edit-exchange-item');
        
        // Route::view('/posts', 'back.pages.posts')->name('posts');
        Route::get('/home',         [UsersController::class, 'index'])->name('home');
        // Route::post('/logout',      [UsersController::class, 'logout'])->name('logout');
        // Route::post('/change-profile-picture', [AuthController::class,'changeProfilePicture'])->name('change-profile-picture');
        // Route::view('/settings', 'back.pages.settings')->name('settings');
        // Route::post('/change-blog-logo', [AuthController::class, 'changeBlogLogo'])->name('change-blog-logo');
        // Route::post('/change-blog-favicon', [AuthController::class, 'changeBlogFavicon'])->name('change-blog-favicon');
        // Route::post('/create_option', [AuthController::class, 'createPaymentOption'])->name('create_option');
        // Route::post('/edit_option', [AuthController::class, 'editPaymentOption'])->name('edit_option');

        // Route::prefix('posts')->name('posts.')->group(function(){
        //     Route::view('/add-post', 'back.pages.add-post')->name('add-post');
        //     Route::post('/create', [AuthController::class, 'createPost'])->name('create');
        //     Route::view('/all', 'back.pages.all_posts')->name('all_posts');
        //     Route::get('/edit-post', [AuthController::class, 'editPost'])->name('edit-post');
        //     Route::post('/update-post', [AuthController::class, 'updatePost'])->name('update-post');
        // });
        
        // Route::post('/chat-message', function(Request $request){
        //     // dd($request->all());
        //     event(new ChatMessageEvent($request->message));
        // });

        Route::post('/chat-message', [UsersController::class, 'chat']);
        Route::post('/chatsubscription', [UsersController::class, 'chatSubscription']);

        Route::post('/logout',      [UsersController::class, 'logout'])->name('logout');
        Route::post('/pop-payment/prove', [UsersController::class, 'popPayment']);
        Route::post('/pop-payment/approval', [UsersController::class, 'popApproval']);
        
    });
});