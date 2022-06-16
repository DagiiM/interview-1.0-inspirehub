<style>
.search-none{
    display:none;
}
</style>
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('abilities.index')}}" link-name="All Abilities" content-title="Ability / Permission"></x-content-head>

     <!--================== End of Content Head =========================-->
   
    <x-table>
        <x-slot name="caption">
            Ability / Permission
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
            <th scope="col" class="app-center">Actions</th>
      </x-slot>

            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td>
                    <div class="status status--{{ $data->priority == 'Core' ? 'active' : 'pending'}}">{{$data->priority}}</div>
                </td>
                

      <!-- Action Button -->
         <x-action-button view-link="{{route('abilities.show',$data->id)}}" edit-link="{{route('abilities.edit',$data->id)}}" delete-link="{{route('abilities.destroy',$data->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

    </x-table>

</x-app-layout>


