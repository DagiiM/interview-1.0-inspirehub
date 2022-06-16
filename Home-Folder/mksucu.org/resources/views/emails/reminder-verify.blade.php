@component('mail::message')

<center>
<div style="width:100px;height:100px;">
  <img src="{{asset('./img/logo.png')}}">
</div>
</center>
{{$greeting}} <b>
  @foreach($user as $user)
    {{$user}}
  @endforeach
 </b>,
<br>

@component('mail::panel')
<p>This is Just a Reminder that you have Not Verified your Email. Please  do Verify to Enjoy more services</p>

@endcomponent

@component('mail::button', ['url' => '/dashboard','color'=>'success'])
Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
