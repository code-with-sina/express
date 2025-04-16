<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::prefix('author')->name('author.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'back.pages.auth.login')->name('login');
        Route::view('/forgot-password', 'back.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/token', [AuthController::class, 'ResetForm'])->name('reset-form');
    });
    
    Route::middleware(['auth:web'])->group(function(){
       
        Route::get('/profile', [AuthController::class, 'authorProfile'])->name('profile');
        Route::get('/competitor', [AuthController::class, 'competitorStats'])->name('competitor');
        Route::get('/authors', [AuthController::class, 'authorAuthors'])->name('authors');
        Route::get('/categories', [AuthController::class, 'authorCategories'])->name('categories');
        Route::get('/exchange-item',[AuthController::class, 'authorExchangeItems'])->name('exchange-item');
        Route::get('/set-labels',[AuthController::class, 'authorSetLabels'])->name('set-labels');
        Route::get('/edit-exchange-item/{any}', [AuthController::class, 'editExchnageItem'])->name('edit-exchange-item');
        Route::get('/transactions/{transactions}', [AuthController::class, 'transactions'])->name('transactions');
        Route::get('/accept/{id}', [AuthController::class, 'acceptOrderStart']);  
        Route::get('/confirm/{id}', [AuthController::class, 'confirmAndRelease']); 
        Route::get('/verify-users', [AuthController::class, 'verifiedUsers'])->name('verifications'); 
        Route::get('/verify-users/{id}', [AuthController::class, 'verifiedUser'])->name('verify-users');
        Route::get('/verify-users/deny/{id}', [AuthController::class, 'verifiedDeny']);
        Route::get('/verify-users/approve/{id}', [AuthController::class, 'verifiedApprove']);

        Route::get('/how-to-vids', [AuthController::class, 'howToVids'])->name('how-to-vids');
        Route::post('/how-to-videos', [AuthController::class, 'createYoutubeVideo'])->name('create-Youtube-Video');

        Route::post('/edit-labels/{any}', [AuthController::class, 'editLabel'])->name('edit-labels');
        Route::get('/delete-label/{any}', [AuthController::class, 'deleteLabel'])->name('delete-labels');
        Route::get('/getpay-detail/{any}', [AuthController::class, 'getStatus'])->name('get-status');
        
        Route::get('/chats', [AuthController::class, 'expressChats'])->name('chats');
        Route::get('/processing-transaction', [AuthController::class, 'processingTransaction'])->name('processing-transaction');
        Route::get('/success-transaction', [AuthController::class, 'successTransaction'])->name('success-transaction');
        Route::get('/cancelled-transaction', [AuthController::class, 'cancelledTransaction'])->name('cancelled-transaction');
        Route::get('/express-transactions', [AuthController::class, 'transactionDetail'])->name('express-transactions');  
        Route::post('/chat-message', [AuthController::class, 'chatMessage']);
        Route::post('/express/payment', [AuthController::class, 'payMessage']);
        Route::post('/set_labels', [AuthController::class, 'setLabels'])->name('set_labels');
        
        Route::post('/cancel-payment/cancelled', [AuthController::class, 'cancelPayment']);

        Route::post('/express/transaction/chat', [AuthController::class, 'expressTransactionMessages']);
        Route::post('/express/transaction/chat/history', [AuthController::class, 'expressTransactionMessagesHistory']);
        
        Route::post('/express/disburse/payment', [AuthController::class, 'payout']);
        Route::post('/express/disburse/commission-payment', [AuthController::class, 'commissionsOtp']);
        Route::post('/compstats', [AuthController::class, 'competition'])->name('compstats');
        Route::post('/compstats-delete', [AuthController::class, 'competitionDelete'])->name('compstats-delete');
        Route::post('/express/disburse/repay-failed-payment', [AuthController::class, 'failedPayout']);
        Route::post('/confirm-otp', [AuthController::class, 'otpConfirm']);
        Route::post('/commission-confirm-otp', [AuthController::class, 'commissionConfirmOtp']);
        Route::post('/failed-transaction-confirm-otp', [AuthController::class, 'failedTransactionOtpConfirm']);
        Route::post('/express/manual/payment', [AuthController::class, 'manualPayOut']);

        Route::post('/dispatch/notification', [AuthController::class, 'dispatchNotifier']);

        Route::view('/posts', [AuthController::class, 'authorPosts'])->name('posts');
        Route::get('/home',         [AuthController::class, 'index'])->name('home');
        Route::get('/commission',         [AuthController::class, 'commission'])->name('commission');
        Route::post('/logout',      [AuthController::class, 'logout'])->name('logout');
        Route::post('/change-profile-picture', [AuthController::class,'changeProfilePicture'])->name('change-profile-picture');
        Route::get('/settings', [AuthController::class, 'authorSettings'])->name('settings');
        Route::post('/change-blog-logo', [AuthController::class, 'changeBlogLogo'])->name('change-blog-logo');
        Route::post('/change-blog-favicon', [AuthController::class, 'changeBlogFavicon'])->name('change-blog-favicon');
        Route::post('/create_option', [AuthController::class, 'createPaymentOption'])->name('create_option');
        Route::post('/edit_option', [AuthController::class, 'editPaymentOption'])->name('edit_option');
        Route::post('/commission-process', [AuthController::class, 'validateCommision'])->name('commission-process');


        // Route::view('/payment-process', [AuthController::class, 'paymentProcess']);


        Route::prefix('posts')->name('posts.')->group(function(){
            Route::get('/add-post', [AuthController::class, 'authorAddPost'])->name('add-post');
            Route::post('/create', [AuthController::class, 'createPost'])->name('create');
            Route::get('/all', [AuthController::class, 'authorAllPost'])->name('all_posts');
            Route::get('/edit-post', [AuthController::class, 'editPost'])->name('edit-post');
            Route::post('/update-post', [AuthController::class, 'updatePost'])->name('update-post');
        });
    });
});