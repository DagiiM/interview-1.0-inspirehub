
<x-app-layout>
    <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
    <!--================== Content Head =========================-->
     <x-content-head link="{{route('images.create')}}" link-name=" Upload a new Carousel Image" content-title="Carousel Images"></x-content-head>

     <!--================== End of Content Head =========================-->

@if($data->count()>0)

<x-table>
      <x-slot name="caption">
          Images
      </x-slot>

  <x-slot name="th">
      <th scope="col">#</th>
      <th scope="col">Images</th>
      <th scope="col">Subject</th>
      <th scope="col">Actions</th>
  </x-slot>
  
@foreach($data as $image)
  <tr>
      <th scope="row">{{$image->id}}</th>
      <td>
        <a href="{{asset('./img/'.$image->image)}}"  data-lightbox="mygallery" data-title="{{$image->subject}}">
            <img src="{{asset('./img/'.$image->image)}}" alt="{{$image->subject}}" style="width:48px;height:48px"/>
        </a>
      </td>
       <td scope="row">{{$image->subject}}</td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('images.show',$image)}}" edit-link="{{route('images.edit',$image)}}" delete-link="{{route('images.destroy',$image)}}"></x-action-button>
    <!-- End of Action Button -->

    </tr>
@endforeach
</x-table>
{{ $data->links()}}

@else
      <x-data-empty>No images Available</x-data-empty>
@endif
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" ></script>

</x-app-layout>
