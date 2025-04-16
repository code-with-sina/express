@extends('front.layouts.pages-layout')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Blog Article')
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

        <div class="col-12 col-md-12 border-bottom mt-5 py-2">
            <div class="row text-white">
                <div class="d-block d-sm-none col-12 col-md-12">
                    <img src="/storage/images/post_images/{{ $post->featured_image }}" class="img-fluid w-100 m-0 p-0" alt="">
                </div>
                <div class="col-12 col-md-12">
                    <h1 class="fw-bold my-2">
                        {{ $post->post_title }}
                    </h1>
                </div>
                <div class="col-12 col-md-12 d-none d-sm-block">
                    <img src="/storage/images/post_images/{{ $post->featured_image }}" class="img-fluid w-100 m-0 p-0" alt="">
                </div>
                <div class="col-12 col-md-12">
                    <p class="fw-light mb-1 text-white">
                        {!! Str::ucfirst($post->post_content) !!}
                    </p>
                    
                </div>
                
            </div>
            <div class="row text-white">
                <div class="container-fluid border-bottom py-2 mb-5">
                    <span class="text-sencondary fw-bold text-uppercase">
                        {{ $post->author->name }}
                    </span>
            
                    <span class="float-end">
                        <small class="text-secondary px-2">
                            {{ date_formatter($post->created_at) }}
                        </small> 
                        
                        <small class="text-secondary ps-2">
                            READ TIME: 
                            {{ readDuration($post->post_title, $post->post_content) }} 
                            @choice('min|mins', readDuration($post->post_title, $post->post_content))
                        </small>
                    </span>
                </div> 
            </div>
        </div>
        

    
@foreach (latest_home_6posts() as $item)
    <div class="row">
        <div class="col-12 col-md-12 border-bottom py-2 mt-2">
            <div class="row justify-between">
                <div class="col-12 col-md-5">
                    <img src="/storage/images/post_images/{{ $item->featured_image }}" class="img-fluid w-100 m-0 p-0" alt="">
                </div>
                <div class="col-12 col-md-7">
                    <button class="btn btn-secondary btn-sm text-white">{{ $item->subcategory->subcategory_name }}</button>
                    <p class="lead fs-4 fw-light">
                        {{ $item->post_title }}
                    </p>
                    <p class="fw-light mb-1">
                        {!! Str::ucfirst(words($item->post_content, 20)) !!}
                    </p>
                </div>
                
            </div>
        </div>
        <div class="container-fluid border-bottom py-2 mb-2">
            <a href="{{ route('read_post', $item->post_slug)}}" class="btn btn-secondary btn-sm float-end" ><small class="float-start text-white">READ MORE</small></a>
            <span class="float-start">
                <small class="text-secondary me-3">
                    {{ date_formatter($item->created_at) }}
                </small> 
                
                <small class="text-secondary">
                    READ TIME: 
                    {{ readDuration($item->post_title, $item->post_content) }} 
                    @choice('min|mins', readDuration($item->post_title, $item->post_content))
                </small>
            </span>
        </div>
    </div>
@endforeach

@endsection