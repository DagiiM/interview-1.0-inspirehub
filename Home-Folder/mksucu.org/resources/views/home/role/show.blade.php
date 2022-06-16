<style>
.search-none{
    display:none;
}
</style>
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('roles.index')}}" link-name="Back Roles" content-title=" Role / Privilege"></x-content-head>

     <!--================== End of Content Head =========================-->
   
    <x-table>
        <x-slot name="caption">
            Role / Privilege
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
             <th scope="col">Creation Date</th>
            <th scope="col" class="app-center">Actions</th>
      </x-slot>

            <tr>
                <td>{{$data2->id}}</td>
                <td>{{$data2->name}}</td>
                <td>{{$data2->description}}</td>
                <td>
                    <div class="status status--{{ $data2->priority == 'Core' ? 'active' : 'pending'}}">{{$data2->priority}}
                  </div>
                <td>{{$data2->created_at}}</td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('roles.show',$data2->id)}}" edit-link="{{route('roles.edit',$data2->id)}}" delete-link="{{route('roles.destroy',$data2->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

    </x-table>

</x-app-layout>


