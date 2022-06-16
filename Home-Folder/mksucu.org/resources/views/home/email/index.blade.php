<x-app-layout>
 
    <!--================== Content Head =========================-->
  <x-content-head link="{{route('emails.create')}}" link-name="Send Email" content-title="All Emails Sent"></x-content-head>

  @if($data->count()>0)
  <div class="table-responsive ">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Message</th>
        <th scope="col">Receiver</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($data as $email)
  <tr>

<td>{{$email->id}}</td>


<td>{{$email->subject}}</td>
<td>{{$email->message}}</td>
<td style="color:brown">{{$email->receiver_email}}</td>

<td class="flex-div-td">
    <a href="{{route('emails.show',$email->id)}}">
<x-icon icon="show" type="show"></x-icon>
      </a>
</td>

  </tr>
  @endforeach

</tbody>
</table>
  {{ $data->links()}}
</div>
@else
  <x-data-empty>
    No Mails Sent Recently
  </x-data-empty>
 @endif
</x-app-layout>
