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
<h1 class="my-2">Terms and Conditions</h1>

<h2 class="my-5">Term of Use <small class="front-end small fs-6">Last Update 7/24/2023</small></h2>
<p>Ratefy Technology (referred to as “the company”) is fully registered in Nigeria (RC 941579). It is a platform for users to conduct currency transactions and provide related services (referred to as “the service”). The company runs a website https://www.ratefy.co/ (referred to as “this website.”) </p>


<p>
By selecting "Agree" during account creation, you confirm that you have read and agree to be bound by the following terms of usage, as would be updated from time to time, regarding the transactions in your account.
 </p>

<p>
    Our team of experts offers the “Ratefy Service”; therefore, you can always contact our Customer Service chat box at <a href="mailto:chat@ratefy.co">Chat@ratefy.co</a> if you're unclear about anything in the "Terms of Service."
</p>

<h2 class="my-5">General Provisions </h2>
<ul>
    <li>
        <p>
            You will be deemed fit to have understood all the regulations guiding you when you sign up to become a Member as you enter into a legally binding contract with us in which you agree to be bound by these Terms of Use whenever you use your account.
        </p>
    </li>
    <li>
        <p>
            You are required to read this Agreement carefully before using the services provided by this website and to seek the advice of an attorney if you have any questions or concerns. As a member, you are to stop using the service offered by this website or log out immediately; you do not agree to the terms and conditions of this Agreement or any modification from time to time.  
        </p>
    </li>
    <li>
        <p>
            By using any service provided by this website or engaging in any similar activity, you agree to be bound by all of the terms and conditions of this Agreement, including any changes, modifications, or alterations that this website may make at any time and in its sole discretion.
        </p>
    </li>
    <li>
        <p>
            As a member of this website, you are entitled to provide a username and password, as you are responsible for keeping these details secure at all times. All members are responsible for any actions taken in their accounts.
        </p>
    </li>
</ul>

<h2 class="my-5">Membership</h2>
<ul>
    <li>
        <p>
            You must ensure all emails, passwords, and usernames are fully active as they pass through our validatory check during registration.
        </p>
    </li>
    <li>
        <p>
            Your account is for your use only; you may not share it with anyone else. You can only have one account at a time, and we reserve the right to terminate any or all of your accounts if we think you have created or are maintaining more than one account without our permission.
        </p>
    </li>
    <li>
        <p>
            If your personal information, such as your name, address, email address, phone number, or payment method details, changes, you are required to update your Account data immediately.
        </p>
    </li>
    <!-- <li>
        <p>
            If your personal information, such as your name, address, email address, phone number, or payment method details, changes, you are required to update your Account data immediately.
        </p>
    </li> -->
</ul>
<h2 class="my-5">Eligibility</h2>
<p>
    To be eligible to use any of our services at Ratefy Technology:

<ul>
    <li>You must be a member, i.e., you must have created an account.</li>
    <li>Your source of income must be legitimate.</li>
    <li>You must always comply with our laws and regulations, including rate fees. </li>
    <li>You must not breach any term of use or have access to any account already closed by our team.</li>
</ul>

<h2 class="my-5">E-wallet Funds Exchange</h2>
<ul>
    <li>Only clean funds would be transacted and exchanged, as fraudulent funds won’t be tolerated.</li>
    <li>
        You will be prompted to choose the e-wallet fund or payment method on our homepage whenever you want to withdraw or exchange funds after registration. Once again, this fully depends on the funds' rates, as it is not fixed.
    </li>
    <li>
        For every initiated transaction, there will be a time frame of 30 minutes for you to make payments to be confirmed by the receiver. 
    </li>
    <li>
        When this 30-minute time frame elapses, and there’s a significant change in exchange rates, the transaction will be canceled, Therefore, users will be prompted to re-initiate another transaction.
    </li>
    <li>
        During transactions, users are advised to use the description tag/ instructions provided by the receiver.
    </li>
    <li>
        Until the receiver confirms your payment, there won’t be payouts.
    </li>
    <li>
        In a scenario where the receiver has disbursed payment, but you happen not to have received it, you must ensure to wait so we can resolve the transaction with our partner.
    </li>
</ul>

<h2 class="my-5">Privacy</h2>
<p>
        For Ratefy to be able to offer payment processing services to you, you must give us consent to access, process, and store the information you supply to us. However, our rights and duties under data privacy laws remain unaffected. By canceling your account, you may revoke this permission at any time. 
</p>
<p>
        We will stop processing your data for this purpose if you withdraw permission in this manner. However, we may still use your data for other purposes if we have other valid reasons to do so, such as if we are obliged by law to provide records of transactions.
</p>

<h2 class="my-5">Calculations</h2>
<p>
    All calculations are done and verified by our exchange rate calculator on the website. This, however, would increase or decrease depending on the rate of transactions. These calculations are also liable to changes based on the different payment methods already stated on the webpage as well.
</p>

<h2 class="my-5">Charge Backs</h2>
<p>
    In a scenario where our user (freelancer) uses Ratefy (referred to as "the company") to receive payment from a client on freelance platforms (Upwork, Fiverr), and Naira has been disbursed into the user's local bank, but a refund has to be made back to the client. 
</p>
<p>
    Any Naira paid out to such a user prior to the termination of service must be refunded under Ratefy's policies. 
</p>
<p>
    Failure to comply with this would lead to a breach of the agreement by the user. Ratefy reserves the right to a third party (lawyer or enforcement officer) to check the information such users provide for investigations.
</p>

<h2 class="my-5">Warranties, Liabilities, and Disclaimers</h2>
<ul>
    <li>
        Ratefy is not affiliated with payment platforms like Paypal, Payoneer, Wise, Skrill, etc.</li>
    <li>
        We reserve the right to a third party to check any information you provide to Ratefy technology for accuracy and validity.
    </li>
    <li>
        When you create an Account, we assume you have checked local rules to ensure you are not violating any laws or regulations. You agree to pay us for all claims, losses, damages, expenses, and liabilities we incur in contradiction of any law or regulation. This clause will remain in effect until our business partnership ends.
    </li>
    <li>
        We promise to do our best to process any payments to and from your account promptly. However, the processing timing depends on various circumstances, some of which are beyond our control. We thus offer no guarantees, representations, or assurances as to the availability, accessibility, or security of the Ratety technology services, all of which may be disrupted from time to time for reasons without our control, including but not limited to routine or emergency maintenance, testing, or upgrades.
    </li>
</ul>
<h2 class="my-5">Complaints Procedure</h2>
<p>
    If you have any issues with our company or the services we provide, please get in touch with our Customer Contact chatbox at <a href="mailto:support@ratefy.co" class="text-white">Support@ratefy.co</a>. It should be apparent that you desire to file a formal complaint with us. 

</p>
<p>
    This lets us tell the difference between a complaint and a simple inquiry. Within hours of receiving your complaint, we will send you an acknowledgment message in line with our complaints policy.

</p>
</div>

@endsection