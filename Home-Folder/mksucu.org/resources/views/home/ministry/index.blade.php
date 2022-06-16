<x-app-layout>

           <!--================== Content Head =========================-->
     <x-content-head link="{{route('ministries.create')}}" link-name="Create Ministry" content-title="Ministries"></x-content-head>

     <!--================== End of Content Head =========================-->


  @if($data->count()>0)
  <x-table>
  <x-slot name="caption">Ministries Available</x-slot>

    <x-slot name="th">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Date Updated</th>
        <th scope="col">Features</th>
        <th scope="col">Action</th>
    </x-slot>
  
  @foreach($data as $ministry)
    <tr>
        <th scope="row">{{$ministry->id}}</th>
        <td>{{$ministry->name}}</td>
        <td>{{$ministry->description}}</td>
        <td>{{$ministry->created_at}}</td>

          <td>
            <a href="{{route('ministries.chats.index',$ministry->id)}}">
             <x-icon icon="chat" type="chat"></x-icon>
          </a>
      @can('ability-list')
          <a href="{{route('ministries.users.index',$ministry->id)}}">
           <x-icon icon="members" type="members"></x-icon>
        </a>
      @endcan
            <a href="{{route('ministries.show',$ministry->id)}}">
              <x-icon icon="show" type="show"></x-icon>
          </a>

          @can('ability-create')
          <a href="{{route('ministries.emails.create',$ministry->id)}}">
               <x-icon icon="email" type="email"></x-icon>
          </a>
          @endcan
       </td>
            <!-- Action Button -->
         <x-action-button view-link="" edit-link="{{route('ministries.edit',$ministry->id)}}" delete-link="{{route('ministries.destroy',$ministry->id)}}">    
         </x-action-button>
    <!-- End of Action Button -->

      </tr>
  @endforeach
    
  </x-table>
    {{ $data->links()}}

  @else
        <x-data-empty>No Ministries Available</x-data-empty>
  @endif

</x-app-layout>
