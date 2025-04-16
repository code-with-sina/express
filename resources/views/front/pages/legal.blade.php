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
    <h1 class="my-2">Legal Statement</h1>

    <p>
        <strong>Dear Ratefy Technology Users,</strong>
        <br>
        You must ensure all detailed information embedded in this legal statement is understood accordingly.
    </p>

    <h2 class="my-5">Statement 1</h2>
    <p>
        This website's stated goal is to comply fully with all applicable laws and regulations while offering a secure, 
        user-friendly, and convenient transaction platform for remote workers, 
        digital workers, and freelancers to a wide audience of interested parties worldwide. 
    </p>
    <p>
        Money laundering, and commercial bribery are all prohibited uses of this website; 
        if an account is suspected of being used for any of these illegal purposes, 
        the account will be frozen and reported to the proper authorities immediately. 
    </p>

    <h2 class="my-5">Statement 2</h2>
    <p>
        In a scenario when a legal authority personnel presents this website with an applicable 
        investigation certificate and requests cooperation in an investigation involving a specific user, 
        or if that user's account is subject to measures like closure, 
        Ratefy technology will cooperate with the authority by providing 
        the relevant information about the user, or performing the relevant operation, as required by that authority.
    </p>

    <h2 class="my-5">Statement 3</h2>
    <p>
        In cases where a user of our services violates the already stated terms of use,
         privacy policy, and rate regulation, we, as a service provider, 
         are obligated to take necessary steps.
    </p>
    <p>
        This is to ensure regulations are kept in place and modified. 
        However, this website is not affiliated with user misconduct, 
        as they will be held solely responsible for each mishap. 
    </p>

    <h2 class="my-5">Statement 4</h2>
    <p>
        Any user or member who has successfully logged in and accessed the services of 
        this website is thereby mandated to conform to the restrictions, 
        rules, and regulations of our terms and policies.
    </p>

    <h5>Ratefy Technology Team</h5>
    <p>
        <strong>Contact</strong> <a href="mailto:chat@ratefy.co" class="text-white">chat@ratefy.co</a>
    </p>
    <p>
        <strong>Twitter:</strong> <a href="https://twitter.com/_Ratefy" target="_blank" class="text-white">@_Ratefy</a>
    </p>
    <p>
        <strong>LinkedIn:</strong> <a href="https://www.linkedin.com/company/ratefy-technology/about/" target="_blank" class="text-white">@ratefy-technology</a>
    </p>
    <p>
        <strong>Instagram:</strong> <a href="https://www.instagram.com/ratefy.co/" target="_blank" class="text-white">@Ratefy.co</a>
    </p>
</div>

@endsection