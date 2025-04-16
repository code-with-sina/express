<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('affiliates-withdrawal',    [AuthController::class, 'affiliateWithdrawal']);
Route::post('user-account',             [UsersController::class, 'userAccount']);
Route::post('user-verification',        [UsersController::class, 'verifyUserIsAffiliate']);
Route::post('user-details',             [UsersController::class, 'userDetail']);
Route::post('authenticating',           [UsersController::class, 'authBroadcastConfirmation']);
Route::post('user-reg-api',             [UsersController::class, 'apiUserRegistration']);
Route::post('verify-user-from-api',     [UsersController::class, 'apiverifyUser']);
Route::post('user-logout-api',          [UsersController::class, 'apiLogout']);
