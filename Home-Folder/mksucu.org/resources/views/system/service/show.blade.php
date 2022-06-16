<style>
.search-none{
    display:none;
}
</style>
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('services.index')}}" link-name="Back to Church Services" content-title="Church Service"></x-content-head>

     <!--================== End of Content Head =========================-->
   
    <x-table>
        <x-slot name="caption">
            Church Services
        </x-slot>
        <x-slot name="th">
          <th scope="col">#</th>
          <th scope="col">Subject</th>
          <th scope="col">Time</th>
          <th scope="col">Actions</th>
      </x-slot>

            <tr>
              <th scope="row">{{$data->id}}</th>
              <td scope="col"> {{$data->subject}}</td>
              <td scope="col">{{$data->time}} </td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('services.show',$data->id)}}" edit-link="{{route('services.edit',$data->id)}}" delete-link="{{route('services.destroy',$data->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

    </x-table>

</x-app-layout>


