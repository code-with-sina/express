<x-mail::message>
<p>
Hi admin
</p>

<p>
You have a message from  {{ $name }} in one of the on going chats
</p>

<p>
    content:    
</p>

<address>
    {{ $message }}
</address>



<x-mail::button :url="$link">
Dive in
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
