<?php

use Illuminate\Http\Request;
use App\Events\PlaygroundEvent;
use App\Events\ChatMessageEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Session;
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



 
Route::get('/referrals/{email}/{code}/', function($email, $code){
    Session::put('referralEmail', $email);
    Session::put('referralCode', $code);
    return redirect('/users/register');
});

Route::get('/referrals/{code}/', function($code){
    Session::put('referralCode', $code);
    return redirect('/users/register');
});

Route::get('/success', function(){
    return view('success');
});


Route::get('/home', [AuthController::class, 'home']);
Route::get('/', [AuthController::class, 'first_index']);


Route::get('sitemap.xml', [SitemapController::class, 'index']);
Route::get('BingSiteAuth.xml', [SitemapController::class, 'bing']);

Route::view('/blog', 'front.pages.home');
Route::view('/about', 'front.pages.about')->name('about');
Route::view('/terms', 'front.pages.terms')->name('terms');
Route::view('/legal', 'front.pages.legal')->name('legal');
Route::view('/fees', 'front.pages.fees')->name('fees');
Route::get('/post/{any}', [BlogController::class, 'readPost'])->name('read_post');
Route::get('/category/{any}', [BlogController::class, 'categoryPosts'])->name('category_posts');
Route::get('/post/tags/{any}', [BlogController::class, 'tagPosts'])->name('tag_posts');
Route::get('/search', [BlogController::class, 'searchBlog'])->name('search_posts');
Route::view('/how-to', 'front.pages.howtovids')->name('howto');


Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
