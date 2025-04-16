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
    <h1 class="my-2">About Us</h1>
    <h2 class="my-5">Get To Know Ratefy! </h2>
    
        <p>
            <a href="https://ratefy.co/" class="text-white">Ratefy Technology</a> is a company fully registered in Nigeria (RC 941579) with its office address at Number 1 Finetouch Hall, Olubose Street, Ile-Ife, Osun state, Nigeria.
        </p>
        <p>
            We are an exchange platform that transacts with business owners, freelancers, marketers, and online entrepreneurs to exchange e-wallet funds from platforms like Paypal, Payoneer, Wise, etc, to their local banks at high market rates. 
        </p>

        <p>
            At <a href="https://ratefy.co">Ratefy.co</a>, we are a registered firm helping business owners and freelancers make better choices compared to other exchange platforms and competitors.
        </p>
        <p>
            In the meantime, Ratefy focuses solely on Nigeria in disbursing payments of the Nigerian Naira to designated local bank accounts.
        </p>

        <h2 class="my-5"> Vision</h2>
        <p>
            Our vision at Ratefy Technology is to ensure easy accessibility of funds from foreign clients to Nigerian freelancers and online business owners at suitable rates directly to their local bank accounts.
        </p>

        <h2 class="my-5">Mission</h2>
        <p>
                We are on a path to rationalizing and fully reducing the substandard rates of transactions in Nigeria, among other payment platforms.
                
        </p>

        <h3 class="my-5"> Our Core Values</h3>
        <ul>
            <li>
                <h4>
                    Client-Centered
                </h4>
                <p>
                    We strive to build our judgments and reviews not based on rivals' actions but on clients' requirements and expectations. At Ratefy, gaining the confidence of our customers has been and will continue to be our top goal.
                </p>
            </li>
            <li>
                <h4>
                    Transparency
                </h4>
                <p>
                    We strive to share information that our consumers want to know, both good and bad, openly and transparently.

                </p>
            </li>
            <li>
                <h4>
                    Win-Win
                </h4>
                <p>
                    We portray ourselves as members of the financial community and aim to achieve sustainable development for the industry by creating win-win situations in every cooperative endeavor.
                </p>
            </li>
        </ul>

        <h2 class="my-5">
            Our Team
        </h2>
        <img src="/front/image/team.jpg" class="img-fluid my-5 rounded-5" alt="Team" />
        <p>
        Ratefy brings together a core team of experts from various fields, such as Product development, Project management, Foreign exchange analysis, Application development, Content creation, and User interface design. Our full-time staff is supplemented by an extended network that brings further in-depth experience, skills, and perspectives to our services.
        </p>
        <h2 class="my-5">How Ratefy Works</h2>
        <p>
        To exchange your funds, you need to sign up on the website if you don’t have an account or log in to your profile page; this will take you to your dashboard, where you will see the <strong>Offers</strong>, <strong>Market</strong>, <strong>Transactions</strong>, <strong>and Bank accounts</strong> on the left-hand side.
        </p>
        <p>
            <strong>The Payer/Exchanger</strong>: If you are trying to exchange your e-wallet funds to your local bank, select the amount of funds you want, as they vary on the menu bar. 

        </p>
        <p>
            It ranges from $50-$5000 for Payoneer funds, while Paypal funds range from $10- $2000 cumulatively. The rate changes depending on whether you’re withdrawing from Fiverr or using the Family and Friend (FnF) transaction method. 
        </p>
        <p>
            <strong>Ratefy Admin:</strong> Ratefy admins will verify and complete your transaction smoothly within a few minutes and ensure funds are disbursed into your local bank. You can always communicate with the admin during the transaction using the chat box system provided.
        </p>
        <p>
            <strong>Note:</strong> The latest exchange for all e-wallets is displayed on the Ratefy homepage. You can check the reviewing amount you will get in Naira for any amount you want to exchange.

        </p>
       

        <h2 class="my-5">Why Work With Ratefy?</h2>
        <p>As an exchange platform, there are several reasons why you should make your funds transaction with us, irrespective of the amount.</p>

        <ul>
            <li>
                <h3>Secure Transactions</h3>
                <p>Our Users can feel completely at ease while using Ratefy, knowing their money is protected and payouts are processed automatically by the Ratefy admins.</p>
            </li>
            <li>
                <h3>Frequent Rates Update</h3>
                <p>Compared to our competitors, we make a routine rate change on all our payment methods every hour within twenty-four hours. </p>
            </li>
            <li>
                <h3>Privacy</h3>
                <p>When you make your transactions with us, Ratefy ensures all confidential information, passwords, and personal details are not disclosed outside the transaction process as regards our policy.</p>
            </li>
            <li>
                <h3>Organized Employees</h3>
                <p>Working behind the scenes are well-experienced and professional employees ensuring transactions are made accurately and timely. At Ratefy, we are well-versed in customer service relationships between contractors and strive to ensure every client's needs are met accordingly. </p>
            </li>
            <li>
                <h3>Newsroom and Blog Posts</h3>
                <p>At Ratefy, we provide enough updates on <a href="https://ratefy.co/blog" class="text-white"> our blog page</a> for free for users and visitors who are invested in advanced knowledge about the latest updates in the finance sector.</p>
            </li>
        </ul>

        <h2 class="my-5">Our Services</h2>
        <ul>
            <li>
                <h3>Exchange Rates Updates</h3>
                <p>After logging in, our exchange rates update twenty-four times daily at parallel market rates on our offers menu tab. This is done to ensure our clients are up to date about the prices of each fund.</p>
            </li>
            <li>
                <h3>Exchange Rate Calculator</h3>
                <p>For credibility, our exchange rate calculator does accurate valuations for your funds if you intend on selling them, irrespective of the payment method.</p>
            </li>
            <li>
                <h3>Exchange of Foreign Currencies</h3>
                <p>One of our major strengths is the exchange of e-wallet funds, irrespective of denomination, to Nigerian Naira at standard rates enabling freelancers and remote workers to exchange their funds at good rates, thereby keeping more of what is being earned.</p>
            </li>
            <li>
                <h3>Cross-Border Payments</h3>
                <p>We do the hard work by collecting all your funds and making payments straight into your local bank by following the necessary procedure.</p>
            </li>
            <li>
                <h3>Fiverr and Upwork Withdrawals</h3>
                <p>At Ratefy Technology, we also assist freelancers in the withdrawals of funds on top freelancing platforms. We also do this seamlessly, ensuring remote workers get access to their money.</p>
            </li>
        </ul>

        <h2 class="my-5">Get In Touch With Ratefy Today!</h2>
        <p>
            Our services are accessible to all freelancers and remote workers across platforms like Upwork and Fiverr. If there are any more inquiries you would love to make, ensure to contact us at <a href="mailto:chat@ratefy.co" class="text-white">Chat@ratefy.co.</a>
        </p>


</div>

@endsection