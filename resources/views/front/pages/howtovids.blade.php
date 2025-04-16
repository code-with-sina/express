@extends('front.layouts.external-pages-layout')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'How to Videos')
@section('meta_tags')
    <meta name="robot" content="index,follow" />
    <meta name="title" content="{{ blogInfo()->blog_name }}" />
    <meta name="description" content="{{ blogInfo()->blog_description }}" />
    <meta name="author" content="{{ blogInfo()->blog_name }}" />
    <link rel="canonical" href="{{ Request::root() }}" />
    <meta property="og:title" content="{{ blogInfo()->blog_name }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ blogInfo()->blog_description }}" />
    <meta property="og:url" content="{{ Request::root() }}" />
    <meta property="og:image" content="{{ blogInfo()->blog_logo }}" />
    <meta name="twitter:domain"     content="{{ Request::root() }}" />
    <meta name="twitter:card"     content="summary" />
    <meta name="twitter:title" property="og:title" itemprop="name" content="{{ Request::root() }}" />
    <meta name="twitter:description" property="og:description" itemprop="description"     content="{{ blogInfo()->blog_description }}" />
    <meta name="twitter:image"      content="{{ blogInfo()->blog_logo }}" />
    
@endsection
@section('content')


<div class="container-fluid p-0">
    <h1 class="my-2">How to Videos</h1>
    
    <div class="row gx-5"> 
        <div class="col-12 col-lg-7">

            @php 
                if(app('request')->input('vid') == ''){
                    $vid = App\Models\HowToVid::latest()->first();
                }else {
                    $vid = App\Models\HowToVid::where('slug', app('request')->input('vid'))->first();
                }
            @endphp

            
            <iframe class="w-100" style="border-radius: 10px !important; height: 400px"
                src="{{ $vid->link }}">
            </iframe>
            <p class="text-little"> {{ $vid->title }} </p>
            <p class="text-little"> {{ $vid->description }} </p>
        </div>
        <div class="col-12 col-lg-5 bg-ratefy-secondary py-2">
            @php 
                $videos = App\Models\HowToVid::all();
            @endphp

            @foreach($videos as $video )

                <div class="card border border-0 rounded-5 my-2 bg-ratefy-secondary">
                    <div class="card-body  my-2 @if (url()->full() == url('/how-to?vid='.$video->slug)) bg-success @endif bg-secondary rounded-3">
                        <a href="{{ url('/how-to?vid='.$video->slug) }}" class="stretched-link text-white nav-link text-smaller px-1 px-lg-3 py-0 py-lg-1">{{ $video->title }}</a> 
                    </div>
                </div>

            @endforeach
            
        </div>
    </div>
    

    
</div>

@endsection