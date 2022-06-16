<style>
.search-none{
    display:none;
}
</style>
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('contacts.index')}}" link-name="Back to Contacts" content-title="Contacts Persons"></x-content-head>

     <!--================== End of Content Head =========================-->
   
    <x-table>
        <x-slot name="caption">
            Contact
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Actions</th>
      </x-slot>

            <tr>
              <th scope="row">{{$data->id}}</th>
              <td scope="col"> {{$data->name}}</td>
              <td scope="col">{{$data->mobile}} </td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('contacts.show',$data->id)}}" edit-link="{{route('contacts.edit',$data->id)}}" delete-link="{{route('contacts.destroy',$data->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

    </x-table>

</x-app-layout>


