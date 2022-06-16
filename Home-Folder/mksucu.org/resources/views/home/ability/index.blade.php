<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('abilities.create')}}" link-name=" Create New Ability" content-title="Abilities to attach to Roles"></x-content-head>

     <!--================== End of Content Head =========================-->
      @if($data->count()>0)
    <x-table>
        <x-slot name="caption">
            Abilities to attach to Roles
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
            <th scope="col">Deleted</th>
            <th scope="col" class="app-center">Actions</th>
      </x-slot>


        @foreach($data as $ability)
            <tr>
                <td>{{$ability->id}}</td>
                <td >{{$ability->name}}</td>
                <td>{{$ability->description}}</td>

                <td>
                  <div class="status status--{{ $ability->priority == 'Core' ? 'active' : 'pending'}}">{{$ability->priority}}</div>
                </td>

                 <td>
              @if($ability->deleted_at!=null)
                <p style="color:firebrick"> True</p>

                @elseif($ability->deleted_at==null)
                <p style="color:blue">False</p>
                @endif
              </td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('abilities.show',$ability->id)}}" edit-link="{{route('abilities.edit',$ability->id)}}" delete-link="{{route('abilities.destroy',$ability->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>


        @endforeach

    </x-table>
      {{ $data->links()}}
</div>


  @else
    <x-data-empty>
      No Abilities Available
    </x-data-empty>
  @endif


</x-app-layout>

