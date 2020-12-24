@component('mail::message')
# Reset Password

Click button to go to link.

@component('mail::button', ['url' => $link])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
