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

<div class="container mb-3>
    <p class="float-start >{{ $pageTitle }}</p>

</div>


    
    <div class="row mt-3 mx-auto">
        @forelse($posts as $item)
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 py-2">
                    <div class="row justify-between">
                        <div class="col col-md-12">
                            <img src="/storage/images/post_images/{{ $item->featured_image }}" class="img-fluid w-100 m-0 p-0" alt="">
                        </div>
                        <div class="col col-md-12">
                            <p class="lead fs-4 fw-light">
                                {{ $item->post_title }}
                            </p>
                            <p class="fw-light mb-1">
                                {!! Str::ucfirst(words($item->post_content, 20)) !!}
                            </p>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="container-fluid py-2 mb-5">
                    <a href="{{ route('read_post', $item->post_slug)}}" class="btn btn-secondary btn-sm float-end" ><small class="text-white">READ MORE</small></a>
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
        </div>
        @empty
            <span class="text-danger">No post(s) found!</span>
        @endforelse

    </div>
    <div class="row">
        <div class="col-12">
            {{ $posts->appends(request()->input())->links('custom_pagination') }}
        </div>
    </div>
    
@endsection