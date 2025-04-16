<x-mail::message>

From {{ ($firstname) }},

I sent you some headline ideas last week. Have you had a chance to look at them?
I’m really excited to write for the Summer Camp Project, so I outlined the first post this morning.

See it here: www.summercamp.com/welcomepost. What do you think?

Let me know if you’d like me to add/remove something.




<x-mail::button :url="$link">
Sign Up
</x-mail::button>

Thanks,<br>
{{ ($firstname) }}<br>
{{ config('app.name') }}
</x-mail::message>
