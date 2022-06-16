@section('sidebar')
<!---Sidebar--------------->
  <aside class="sidebar">
<ul>
  @if($data->count()>0)
  @foreach($data as $ministry)
  <li>
        <x-nav-link href="{{route('ministries.chats.index',['ministry'=>$ministry])}}"> <img src="{{asset('./img/'.$ministry->image)}}" style="width:30px;height:30px;border-radius:100%;margin-right:2px"/>
        <div >
        <div> {{$ministry->name}}</div>
        </div>
        </x-nav-link>
    </li>
  @endforeach
    <x-join-ministry-card/>
  @else
<x-join-ministry-card/>

  @endif
  </ul>
  </aside>
@endsection


<x-app-layout>
<style>
main{
	--_bg-size:var(--bg-size,40%);
	background-image: url("img/chat-bg.svg");
	background-repeat: no-repeat, repeat;
  background-position: center;
	background-size: contain;
	background-size: var(--_bg-size);
  height: calc(100% - var(--nav-height)*2);
	box-shadow: 0 0 0 0 transparent;
}
@media(min-width:44.999rem){
	main{
		--bg-size:30%;
	}
}
@media(max-width:34.999rem){
	main{
		--bg-size:60%;
	}
}
@media(max-height:592px){
	main{
		--bg-size:30%;
	}
}

</style>

<section style="font-style:italic;text-align:center;margin-top:5%;background:#22222214;place-self: stretch center;padding:1%;border-radius:var(--app-br);height:calc(var(--nav-height)/2);align-content:center;">
<x-icon type="info" icon="info"></x-icon>Select a Ministry to start Chatting...</section>
  
</x-app-layout>


