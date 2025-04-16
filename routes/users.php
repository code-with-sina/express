<?php

use Illuminate\Http\Request;
use App\Events\ChatMessageEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('users.login');
    });
    Route::middleware(['guest:web'])->group(function () {
        Route::get('/login', function () {
            return redirect()->away('https://market.ratefy.co/auth/login?subdomain=express');
        })->name('login');
        Route::get('/register', function () {
            return redirect()->away('https://market.ratefy.co/auth/register?subdomain=express');
        })->name('register');
        // Route::view('/login', 'back.pages.seller_auth.login')->name('login');
        // Route::view('/register', 'back.pages.seller_auth.register')->name('register');
        Route::get('/activate/{req}', [UsersController::class, 'activate'])->name('activate');
        Route::view('/forgot-password', 'back.pages.seller_auth.forgot')->name('forgot-password');
        Route::get('/password/reset/token', [UsersController::class, 'ResetForm'])->name('reset-form');
        Route::get('auth-test/{token}', [UsersController::class, 'authTest']);
    });


    Route::middleware(['auth:web'])->group(function () {
        Route::get('__marketplace', function () {
            return redirect()->away('https://market.ratefy.co/dashboard/overview');
        })->name('__marketplace');
        Route::view('/profile', 'back.pages.users.profile')->name('profile');
        Route::view('/profile/detail', 'back.pages.users.profile-edit-detail')->name('profile.detail');
        Route::view('/profile/address', 'back.pages.users.profile-edit-address')->name('profile.address');
        Route::view('/bank', 'back.pages.users.bank-account')->name('bank');
        Route::view('/bank/edit', 'back.pages.users.bank-account-edit')->name('bank.edit');

        Route::get('/calculate', [UsersController::class, 'caluculator'])->name('calculator');
        Route::view('/mobile-calculate', 'back.pages.users.mobile-calculate')->name('mobile-calculator');

        Route::get('/verification', [UsersController::class, 'verifiable'])->name('verification');
        Route::get('/buzprofile', [UsersController::class, 'buzprofile'])->name('buzprofile');
        Route::get('/edit-buzprofile', [UsersController::class, 'editBuzprofile'])->name('edit-buzprofile');

        Route::view('/activity', 'back.pages.users.activity')->name('activities');
        Route::view('/success-activity', 'back.pages.users.success-activity')->name('success-activities');
        Route::post('/sell', [UsersController::class, 'sellOut'])->name('sell');
        Route::get('/transactions/{transactions}', [UsersController::class, 'transactions'])->name('transactions');
        Route::post('/transaction-session', [UsersController::class, 'getSessions']);

        Route::post('/express/transaction', [UsersController::class, 'expressTransaction']);
        Route::get('/express-transaction', [UsersController::class, 'expressTransactionActivity']);
        Route::get('/mobile/express-transaction', [UsersController::class, 'mobileExpressTransactionActivity']);
        Route::get('/whatsapp/', [UsersController::class, 'whatsapp'])->name('whatsapp');

        Route::get('/express/awaiting-confirmation', [UsersController::class, 'awaitingConfirmation']);
        Route::get('/express/complete-transaction', [UsersController::class, 'completeTransaction']);

        Route::get('/upcoming', [UsersController::class, 'bankprofilefeature'])->name('upcoming-feature');
        Route::post('/express/transaction/chat', [UsersController::class, 'expressTransactionMessages']);
        Route::post('/express/transaction/chat/history', [UsersController::class, 'expressTransactionMessagesHistory']);

        Route::post('/buzprofiles', [UsersController::class, 'businessProfileCreate'])->name('buzprofiles');
        Route::post('/verifiable', [UsersController::class, 'startVerification'])->name('verified');
        Route::post('/update-verifiable', [UsersController::class, 'updateVerification'])->name('update-verified');

        Route::get('device', [UsersController::class, 'deviceChecker']);
        Route::get('new-calculator', [UsersController::class, 'newCalculator']);

        Route::get('/home',         [UsersController::class, 'index'])->name('home');

        Route::get('/new-chat-home',    [UsersController::class, 'newChatHome']);
        Route::get('/new-chat-mobile',  [UsersController::class, 'newChatMobile']);

        Route::post('/chat-message', [UsersController::class, 'chat']);
        Route::post('/message-admin', [UsersController::class, 'messageadmin']);
        Route::post('/chatsubscription', [UsersController::class, 'chatSubscription']);

        Route::post('/cancel-payment/cancelled', [UsersController::class, 'cancelPayment']);

        Route::post('/pop-payment/prove', [UsersController::class, 'popPayment']);
        Route::post('/pop-payment/approval', [UsersController::class, 'popApproval']);
        Route::post('/pop-payment/pay-approval', [UsersController::class, 'popPaymentApproval']);

        Route::post('username', [UsersController::class, 'getUsername']);
        Route::post('feedback', [UsersController::class, 'getFeedback']);


        Route::post('/navigator',      [UsersController::class, 'createAuthorization'])->name('navigator');
        Route::post('/logout',      [UsersController::class, 'logout'])->name('logout');
    });
});
