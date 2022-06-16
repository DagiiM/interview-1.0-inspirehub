<x-app-layout>
    <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('events.create')}}" link-name="Create New Event" content-title="List of Events"></x-content-head>

     <!--================== End of Content Head =========================-->
      @if($data->count()>0)
    <x-table>
        <x-slot name="caption">
            events
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">subject</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Date Updated</th>
            <th scope="col">Actions</th>
      </x-slot>

        @foreach($data as $event)
            <tr>
               <td>{{$event->id}}</td>
                <td>{{$event->subject}}</td>
               <td>{{$event->description}}</td>
              <td>
                <a href="{{ asset('../../img/'.$event->url)}}" data-lightbox="mygallary">
                  <img src="{{ asset('../../img/'.$event->url)}}" style="width:48px;height:48px" alt="{{$event->subject}}"/>
                </a>
              </td>
              <td>{{$event->created_at}}</td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('events.show',$event->id)}}" edit-link="{{route('events.edit',$event->id)}}" delete-link="{{route('events.destroy',$event->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

        @endforeach

    </x-table>
      {{ $data->links()}}
</div>

<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" ></script>

  @else
    <x-data-empty>
       No Events Available
    </x-data-empty>
  @endif

</x-app-layout>

