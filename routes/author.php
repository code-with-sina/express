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
        Route::view('/profile', 'back.pages.profile')->name('profile');
        Route::view('/authors', 'back.pages.authors')->name('authors');
        Route::view('/categories', 'back.pages.categories')->name('categories');
        Route::view('/exchange-item','back.pages.exchange-item')->name('exchange-item');
        Route::view('/set-labels','back.pages.set-labels')->name('set-labels');
        Route::get('/edit-exchange-item/{any}', [AuthController::class, 'editExchnageItem'])->name('edit-exchange-item');
        Route::get('/transactions/{transactions}', [AuthController::class, 'transactions'])->name('transactions');
        Route::get('/accept/{id}', [AuthController::class, 'acceptOrderStart']);  
        Route::get('/confirm/{id}', [AuthController::class, 'confirmAndRelease']);  

        Route::post('/edit-labels/{any}', [AuthController::class, 'editLabel'])->name('edit-labels');
        Route::get('/delete-label/{any}', [AuthController::class, 'deleteLabel'])->name('delete-labels');
        
        
        Route::get('/chats', [AuthController::class, 'expressChats'])->name('chats');
        Route::get('/express-transactions', [AuthController::class, 'transactionDetail'])->name('express-transactions');  
        Route::post('/chat-message', [AuthController::class, 'chatMessage']);
        Route::post('/express/payment', [AuthController::class, 'payMessage']);
        Route::post('/set_labels', [AuthController::class, 'setLabels'])->name('set_labels');
        


        Route::post('/express/transaction/chat', [AuthController::class, 'expressTransactionMessages']);
        Route::post('/express/transaction/chat/history', [AuthController::class, 'expressTransactionMessagesHistory']);
        

        Route::post('/express/disburse/payment', [AuthController::class, 'payout']);
        Route::post('/express/manual/payment', [AuthController::class, 'manualPayOut']);

        Route::view('/posts', 'back.pages.posts')->name('posts');
        Route::get('/home',         [AuthController::class, 'index'])->name('home');
        Route::post('/logout',      [AuthController::class, 'logout'])->name('logout');
        Route::post('/change-profile-picture', [AuthController::class,'changeProfilePicture'])->name('change-profile-picture');
        Route::view('/settings', 'back.pages.settings')->name('settings');
        Route::post('/change-blog-logo', [AuthController::class, 'changeBlogLogo'])->name('change-blog-logo');
        Route::post('/change-blog-favicon', [AuthController::class, 'changeBlogFavicon'])->name('change-blog-favicon');
        Route::post('/create_option', [AuthController::class, 'createPaymentOption'])->name('create_option');
        Route::post('/edit_option', [AuthController::class, 'editPaymentOption'])->name('edit_option');

        Route::prefix('posts')->name('posts.')->group(function(){
            Route::view('/add-post', 'back.pages.add-post')->name('add-post');
            Route::post('/create', [AuthController::class, 'createPost'])->name('create');
            Route::view('/all', 'back.pages.all_posts')->name('all_posts');
            Route::get('/edit-post', [AuthController::class, 'editPost'])->name('edit-post');
            Route::post('/update-post', [AuthController::class, 'updatePost'])->name('update-post');
        });
        
    });
});