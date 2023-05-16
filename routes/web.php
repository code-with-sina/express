<?php

use Illuminate\Http\Request;
use App\Events\PlaygroundEvent;
use App\Events\ChatMessageEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


 Route::get('/route-cache', function() {
      \Illuminate\Support\Facades\Artisan::call('route:cache');
     echo 'Routes cache cleared';
 });

 //Clear config cache
 Route::get('/config-cache', function() {
      \Illuminate\Support\Facades\Artisan::call('config:cache');
     echo 'Config cache cleared';
 }); 

 // Clear application cache
 Route::get('/clear-cache', function() {
      \Illuminate\Support\Facades\Artisan::call('cache:clear');
     echo 'Application cache cleared';
 });

 // Clear view cache
 Route::get('/view-clear', function() {
      \Illuminate\Support\Facades\Artisan::call('view:clear');
     echo 'View cache cleared';
 });

 // Clear cache using reoptimized class
 Route::get('/optimize-clear', function() {
      \Illuminate\Support\Facades\Artisan::call('optimize:clear');
     echo 'View cache cleared';
 });
 
 Route::get('/success', function() {
     return view('success');
 });
 
 

Route::get('/home', [AuthController::class, 'home']);
Route::get('/', [AuthController::class, 'first_index']);
Route::get('/newt/login', [AuthController::class, 'login']);
Route::get('/newt/register', [AuthController::class, 'register']);
Route::get('/newt/dashboard', [AuthController::class, 'dashboard']);
Route::get('/newt/active-dashboard', [AuthController::class, 'activeExchange']);
Route::get('/newt/past-dashboard', [AuthController::class, 'pastExchange']);
Route::get('/newt/bank-account', [AuthController::class, 'bankAccount']);
Route::get('/newt/profile', [AuthController::class, 'profile']);
Route::get('/newt/profile-edit', [AuthController::class, 'profileEdit']);
Route::get('/newt/delivery-request', [AuthController::class, 'delRequest']);
Route::get('/newt/calculator', [AuthController::class, 'newCalculator']);
Route::get('/newt/emails', [AuthController::class, 'emails']);

Route::get('sitemap.xml', [SitemapController::class, 'index']);
Route::get('BingSiteAuth.xml', [SitemapController::class, 'bing']);

Route::view('/blog', 'front.pages.home')->name('home');
Route::view('/about', 'front.pages.about')->name('about');
Route::view('/terms', 'front.pages.terms')->name('terms');
Route::view('/legal', 'front.pages.legal')->name('legal');
Route::view('/fees', 'front.pages.fees')->name('fees');
Route::get('/article/{any}', [BlogController::class, 'readPost'])->name('read_post');
Route::get('/category/{any}', [BlogController::class, 'categoryPosts'])->name('category_posts');
Route::get('/posts/tags/{any}', [BlogController::class, 'tagPosts'])->name('tag_posts');
Route::get('/search', [BlogController::class, 'searchBlog'])->name('search_posts');

Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



If(\Illuminate\Support\Facades\App::environment('local')){
    Route::get('/playground', function () {
        event(new PlaygroundEvent());
        return null;
    });
    
}