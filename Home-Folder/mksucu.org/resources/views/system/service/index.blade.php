<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('services.create')}}" link-name=" Create New Church Service" content-title="Church Services"></x-content-head>

     <!--================== End of Content Head =========================-->
      @if($data->count()>0)
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


        @foreach($data as $service)
            <tr>
              <th scope="row">{{$service->id}}</th>
              <td scope="col"> {{$service->subject}}</td>
              <td scope="col">{{$service->time}} </td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('services.show',$service->id)}}" edit-link="{{route('services.edit',$service->id)}}" delete-link="{{route('services.destroy',$service->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

        @endforeach

    </x-table>
      {{ $data->links()}}
</div>
  @else
    <x-data-empty>No Services Available</x-data-empty>
  @endif

</x-app-layout>

