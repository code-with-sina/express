<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //

    public function index($vaue=''){
        
        $posts = Post::latest()->get();

        return response()->view('sitemap', [
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
    
    public function bing(){
        return response()->view('bingsiteauth')->header('Content-Type', 'text/xml');
    }
}
