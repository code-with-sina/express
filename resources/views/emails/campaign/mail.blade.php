<x-mail::message>
<p>
    Your Friend, {{ ($firstname) }} is delighted with our exchange services at 
    Ratefy and wishes to introduce you to the best exchanging platform where 
    you get to exchange your e-wallet funds to Naira at high rates 
    through Ratefy Express or Ratefy P2P. 
</p>



<p>
    Ensure to use the link or button below to sign up so we can give you a special treatment and  your friend can get rewarded.
</p>


<x-mail::button :url="$link">
Sign Up
</x-mail::button>

Best regards,
Ratefy Team.

{{ config('app.name') }}
</x-mail::message>
