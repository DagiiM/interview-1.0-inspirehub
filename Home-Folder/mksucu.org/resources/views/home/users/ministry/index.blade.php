<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('users.ministries.create',$user)}}" link-name="Join A Ministry" content-title="My Ministries"></x-content-head>

     <!--================== End of Content Head =========================-->
  @if($data->count()>0)
  <x-table>
  <x-slot name="caption">
  My Ministry 
  </x-slot>
    <x-slot name="th">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
    </x-slot>
     
  @foreach($data as $ministry)
    <tr>
        <th scope="row">{{$ministry->id}}</th>
        <td>
          <a class="mr-5" href="{{route('ministries.show',['ministry'=>$ministry])}}">
              {{$ministry->name}}
            </a>
          </td>

          <td class="flex-div-td">
            <form method="post" enctype="multipart/form-data" action="{{route('users.ministries.destroy',['user'=>$user,'ministry'=>$ministry])}}">
              @csrf
              @method('DELETE')
              <button class="status status--trash">Quit Membership</button>
            </form>
          </td>
      </tr>
  @endforeach

  </x-table>
  {{ $data->links()}}

  @else
     <x-data-empty>You Have No Ministries Defined</x-data-empty>
  @endif

</x-app-layout>
