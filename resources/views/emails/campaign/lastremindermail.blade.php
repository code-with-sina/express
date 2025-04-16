<x-mail::message>
<p>
    We Notice you haven’t join Ratety since our last email.
    Some of the benefits of choosing Ratefy as your exchange platform  are: 
</p>

<pre>
    best rates, privacy,  
    Swift payments, seamless trade, e.t.c. 
</pre>
    
<p>
    Don't miss out; join Ratefy today. Ensure to use the link or button 
    below to sign up so we can give you a special treatment and  your friend can get rewarded.
</p>    


<x-mail::button :url="$link">
Sign Up
</x-mail::button>

Sign up through {{ ($firstname) }} <br>
Best regards,
{{ config('app.name') }}
</x-mail::message>
