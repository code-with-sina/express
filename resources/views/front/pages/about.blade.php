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
    <h2>About Ratefy</h2>

        <p class="lead">Ratefy helps Nigerians to exchange foreign currencies to Naira at the best exchange rate. Ratefy helps Nigerians accept payment around the world using popular payment methods like Payoneer, Paypal, Wise, PerfectMoney, Skill, Neteller, AirTM etc.. No need for a new account details; your Payer choose a convenient payment method, make the payment, We receive the funds on your behalf and pay you the naira equivalent using the pre-known exchange rate for the selected method.</p>

    <h4>How it works</h4>

        <p>    The latest exchange rate for all e-wallets are displayed on the website. You can check the receiving amount you will be geting in naira for any amount you want to exchange. </p>

    <h4>Payoneer Exchange Proccess</h4>

        <p>To exchange Payoneer funds; you transfer the amount you would like to exchange to a payoneer email address that will be assigned to you, make payment and send screenshot for as proof-of-payment, it takes 3-8 minutes for the payment to be received so wait for the payment to be received, send your naira bank account  details and payment will be made instantly.</p>

</div>

@endsection