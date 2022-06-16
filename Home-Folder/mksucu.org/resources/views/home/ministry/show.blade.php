<x-app-layout>
  <a href="{{route('ministries.index')}}"  class="text-decoration-none">
    <div class="flex">
      <x-icon icon="back" type="back"></x-icon>
    <p class="ml-2">All Ministries </p>
  </div>
</a>
@can('ability-create')
<a href="{{route('ministries.emails.create',['ministry'=>$data])}}" class="button" style="width:30%;min-width:150px">
  <div class="flex">
    <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
  <p class="ml-2">Email Members</p>
</div>
</a>
@endcan

<div class="banner" style="margin-left:1%">
<img src="{{asset('/img/'.$data->image)}}"/>
</div>

<div>
  <div style="display:flex;justify-content:space-between;align-items:center;padding:1%;margin:1%">
<h5>{{$data->name}}</h5>

<a href="{{route('ministries.users.index',$data)}}">
  <p class="ml-2">Members Panel</p>
</a>

@can('ability-edit')
<a href="{{route('ministries.edit',$data)}}">
   <x-icon icon="edit" type="edit"></x-icon>
</a>
@endcan

@can('ability-delete')
<a>
<form method="post" enctype="multipart/form-data" action="{{route('ministries.destroy',$data)}}">
  @csrf
  @method('DELETE')
  <x-button style="background-image:linear-gradient(245deg,transparent,transparent);background-color:transparent;--icon-color:var(--first-color)">
    <x-icon icon="delete" type="delete"></x-icon>
</x-button>
</form>
</a>
@endcan

</div>

<center>
    <div style="border:1px dotted gray">
    <h6 style="font-weight:bold">About Us</h6>
    <p>{{$data->description}} </p>
    </div>
</center>

</div>

</x-app-layout>
