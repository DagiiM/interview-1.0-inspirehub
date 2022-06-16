<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('roles.create')}}" link-name=" Create New Role" content-title="Roles/Privileges to be Assigned to Users"></x-content-head>

     <!--================== End of Content Head =========================-->
      @if($data->count()>0)
    <x-table>
        <x-slot name="caption">
            Roles/Privileges to be Assigned to Users
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Deleted</th>
            <th scope="col" class="app-center">Actions</th>
      </x-slot>

        @foreach($data as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td >{{$role->name}}</td>
                <td>{{$role->description}}</td>
                <td>
                  <div class="status status--{{ $role->priority == 'Core' ? 'active' : 'pending'}}">{{$role->priority}}
                </div>
              </td>
                <td>{{$role->created_at}}</td>
                 <td>
              @if($role->deleted_at!=null)
                <p style="color:firebrick"> True</p>

                @elseif($role->deleted_at==null)
                <p style="color:blue">False</p>
                @endif
              </td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('roles.show',$role->id)}}" edit-link="{{route('roles.edit',$role->id)}}" delete-link="{{route('roles.destroy',$role->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

        @endforeach

    </x-table>
      {{ $data->links()}}
</div>
  @else
    <x-data-empty>
      No Roles Available
    </x-data-empty>
  @endif

</x-app-layout>

