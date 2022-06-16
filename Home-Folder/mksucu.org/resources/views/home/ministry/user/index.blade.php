<x-app-layout>
           <!--================== Content Head =========================-->
     <x-content-head link="{{route('dashboard')}}" link-name="Dashboard" content-title="All Members in {{$data2->name}}"></x-content-head>

     <!--================== End of Content Head =========================-->

@if($data->count()>0)
<x-table>
  <x-slot name="caption">All Members in {{$data2->name}}</x-slot>

  <x-slot name="th">
<div class="row ml-4">
 
@can('ability-create')
        <a href="/ministries/{{$data2->id}}/users/member-pdf">
          <div class="flex" style="padding:1%;--icon-color:var(--first-color);color:var(--first-color);background-color:#f3f3f3;border-radius:var(--app-br);width:30%;min-width:190px;margin:1% 1%;border:1px solid var(--first-color);">
              <x-icon icon="download" type="download"></x-icon>
                Download List in a pdf
            </div>
        </a>
  @endcan
</div>

      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Status</th>
      <th scope="col">Deleted</th>
      <th scope="col">Feature</th>
      <th scope="col">Action</th>

  </x-slot>

      <p style="display:none">{{$userid=1}}</p>
@foreach($data as $user)
  <tr>
      <th scope="row">{{$userid++}}</th>
      <td>{{$user->firstname}}</td>
      <td>{{$user->lastname}}</td>
      <td >{{$user->email}}</td>
      <td>{{$user->mobile}}</td>
      <td>
        <div class="status status--{{ $user->verified ? 'active' : 'pending' }}"> 
          {{ $user->verified==1 ? 'Verified' : 'Unverified' }}
        </div>
      </td>
      <td>
        <div class="status status--{{ $user->deleted_at==null ? 'active' : 'pending' }}"> 
          {{ $user->deleted_at==null ? 'False' : 'True' }}
        </div>
      </td>
              
      <td class="flex-div-td">
          <a href="{{route('users.roles.index',$user->id)}}">
            Role
        </a>
    </td>


              <!-- Action Button -->
         <x-action-button view-link="{{route('users.show',$user->id)}}" edit-link="{{route('users.edit',$user->id)}}" delete-link="{{route('users.ministries.destroy',[$user->id,$data2->id])}}">    
         </x-action-button>
    <!-- End of Action Button -->
    </tr>
@endforeach
</x-table>
{{ $data->links()}}

@else
    <x-data-empty>There are No Members Registered in This Ministry</x-data-empty>
@endif

</x-app-layout>
