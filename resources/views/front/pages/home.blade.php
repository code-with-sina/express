@extends('front.layouts.pages-layout')
@section('pagetitle', isset($pagetitle) ? $pagetitle : 'Blog')
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

@if (single_latest_post())
    <div class="col-12 col-md-12 py-2">
        <div class="container-fluid d-none d-sm-block">
           <div class="row justify-between">
                <div class="col-12 col-md-7">
                    <p class="lead fs-4 fw-bold">
                        {{ single_latest_post()->post_title }}
                    </p>
                    <p class="fw-light mb-1">
                        {!! Str::ucfirst(words(single_latest_post()->post_content, 20)) !!}
                    </p>
                </div>
                <div class="col col-md-5">
                    <img src="/storage/images/post_images/{{ single_latest_post()->featured_image }}" class="img-fluid w-100 m-0 p-0" alt="">
                </div>
            </div> 
        </div>
        
        
        <div class="d-block d-sm-none">
           <div class="row">
                <div class="col-12">
                    <img src="/storage/images/post_images/{{ single_latest_post()->featured_image }}" class="img-fluid w-100 m-0 p-0" alt="">
                </div>
                <div class="col-12">
                    <p class="lead fs-4 fw-bold">
                        {{ single_latest_post()->post_title }}
                    </p>
                </div>
                <div class="col-12">
                    <p class="fw-light mb-1">
                        {!! Str::ucfirst(words(single_latest_post()->post_content, 20)) !!}
                    </p>
                </div>
            </div> 
        </div>
        
        
    </div>
    <div class="container-fluid py-2 mb-5">
        <a href="{{ route('read_post', single_latest_post()->post_slug)}}" class="btn btn-secondary btn-sm float-end" ><small class="text-white">READ MORE</small></a>
        <span class="float-start">
            <small class="text-secondary me-3">
                {{ date_formatter(single_latest_post()->created_at) }}
            </small> 
            
            <small class="text-secondary">
                READ TIME: 
                {{ readDuration(single_latest_post()->post_title, single_latest_post()->post_content) }} 
                @choice('min|mins', readDuration(single_latest_post()->post_title, single_latest_post()->post_content))
            </small>
        </span>
    </div>
@endif




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