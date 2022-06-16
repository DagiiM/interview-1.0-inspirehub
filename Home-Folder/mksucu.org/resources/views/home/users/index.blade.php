<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('dashboard')}}" link-name="Dashboard" content-title="All Members"></x-content-head>

     <!--================== End of Content Head =========================-->

  @if($data->count()>0)
      <x-table>
        <x-slot name="caption">All Users of the System</x-slot>
          <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Status</th>
            <th scope="col">Deleted</th>
            <th scope="col">Features</th>
            <th scope="col">Action</th>
          </x-slot>

            <p style="display:none">{{$userid=1}}</p>
      @foreach($data as $user)
        <tr>
            <th scope="row">{{$userid++}}</th>
            <td>{{$user->firstname}}</td>
            <td>{{$user->lastname}}</td>
            <td><a href="tel:{{$user->mobile}}">{{$user->mobile}}</a> </td>
             <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>

            <td>
             <div class="status status--{{ $user->verified==1 ? 'active' : 'pending' }}"> 
               {{ $user->verified==1 ? 'Verified' : 'Unverified' }}
             </div>
              </td>
              <td>
              @if($user->deleted_at!=null)
              
                <a href="{{route('users.restore',$user->id)}}" class="status status--trash">
                    Restore Account
                </a>
                
                @elseif($user->deleted_at==null)
                <div class="status status--active">False</div>
                @endif
              </td>

              <td>
                <a href="{{route('users.roles.index',$user->id)}}">
                  Role
              </a>
                <a href="{{route('users.ministries.index',$user->id)}}">
                 <x-icon icon="members" type="members"></x-icon>
              </a>
      
        </td>
        
             <!-- Action Button -->
         <x-action-button view-link="{{route('users.show',$user->id)}}" edit-link="{{route('users.edit',$user->id)}}" delete-link="{{route('users.destroy',$user->id)}}"></x-action-button>
    <!-- End of Action Button -->

          </tr>
      @endforeach
      </x-table>
         {{ $data->links()}}

      @else
      <x-data-empty>No Members Registered Yet !</x-data-empty>
      @endif

</x-app-layout>
