<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('users.roles.create',$user)}}" link-name="Add Role" content-title="My Roles"></x-content-head>

     <!--================== End of Content Head =========================-->
  @if($data->count()>0)
  <x-table>
  <x-slot name="caption">
      My Roles 
  </x-slot>

    <x-slot name="th">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </x-slot>
  @foreach($data as $role)
    <tr>
        <td scope="row">{{$role->id}}</td>
        <td scope="row">
          <a href="{{route('roles.show',['role'=>$role])}}">
              {{$role->name}}
            </a>
          </td>

        @can('ability-delete')
          <td scope="row">
            <form method="post" enctype="multipart/form-data" action="{{route('users.roles.destroy',[$user,'role'=>$role])}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="status status--trash">
               Remove Role
            </button>
            </form>
          </td>
        @endcan
      </tr>
  @endforeach

    </tbody>
  </x-table>
    {{ $data->links()}}

  @else

  <x-data-empty>No User Roles Defined</x-data-empty>

  @endif


</x-app-layout>




