@component('mail::message')

<div style="width:50%;height:40%;margin:-10px 0px 10px 38%">
 <x-application-logo/>
</div>
<b>Welcome to {{config('app.name')}} Email Verification</b>

<p>Your Registration Was Successful. To Complete Account setup, Please follow the verification link below.</p>

@component('mail::button', ['url' => ''])
Verify Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
