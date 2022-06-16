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
<b>{{$mail->subject}}</b>

@component('mail::panel')
<p>{{$mail->message}}</p>
@endcomponent

<img src="{{asset('./img/'.$mail->url)}}">

@component('mail::button', ['url' => '/dashboard','color'=>'success'])
Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
