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
<h1 class="my-2">Fees</h1>

<h2 class="my-5">Ratefy Technology Transactions</h2>
<ul>
    <li>
        <h3>Foreign Exchange</h3>
        <p>
            For every foreign transaction, independent of the preferred payment method, 
            we shall use the Ratefy technology exchange rate when we carry out the transaction. 
            In addition, if a currency conversion is necessary for a transaction, 
            our exchange rate calculator will give precise calculations on your behalf. 
        </p>
        <p>
            Notably, the Ratefy technology exchange rate is a reference exchange determined 
            by us based on the parallel market rate and changes twenty-four times every twenty-four hours. 
        </p>
        <p>
            Here you can discover information on the Ratefy exchange rate that is applicable at the moment, 
            which may be used to convert different currencies between a payer and a freelancer to Nigerian Naira. 
        </p>
        <p>
            Your transactions with our service will be subject to currency 
            conversion utilizing the Ratefy exchange rate, as your Ratefy 
            account is denominated in a currency other than Nigerian Naira. 
        </p>
    </li>
</ul>

<h2 class="my-5">Ratefy Technology Transactions</h2>
<p>
    If you continue to use your Ratefy account, you will not be charged for paying a service fee. 
    Your Ratefy account's usage is free if you log in or do business with the service.
</p>
<p>
    You will get exactly what you see. After the conversion rate has been decided, we will not impose any fee. 
    We have placed any cost at the exchange rate to make the site user-friendly.
</p>
</div>

@endsection