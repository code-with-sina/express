@extends('front.layouts.external-pages-layout')
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


<div>
    <h2>Legal</h2>

    <p class="lead">This platform is being registered as LLC in Nigeria</p>

    <p>   Further information to be updated as soon as possible. </p>


</div>

@endsection