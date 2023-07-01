@component('mail::message')
Hello {{$member->user_name}}
Your email {{$member->email}}
Your Password {{$member->password}}

Thankyou for create an account. You can use our AURA!

Regards, Kalyani!
@endcomponent