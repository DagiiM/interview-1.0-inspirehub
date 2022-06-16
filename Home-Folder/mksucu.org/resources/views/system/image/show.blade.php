<x-app-layout>
    <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
  <a href="{{route('images.index')}}" class="text-decoration-none">
    <div class="d-flex ml-2">
      <x-icon icon="back" type="back"></x-icon>
    <p class="ml-2">Back to images </p>
  </div>
</a>
<a href="{{asset('./img/'.$data->image)}}"  data-lightbox="mygallery" data-title="{{$data->subject}}">
  <img src="{{asset('./img/'.$data->image)}}" alt="{{$data->subject}}" style="width:350px"/>
</a>

  <!-- Action Button -->
  <div style="width:20%;margin:1% 0">
         <x-action-button view-link="{{route('images.show',$data)}}" edit-link="{{route('images.edit',$data)}}" delete-link="{{route('images.destroy',$data)}}"></x-action-button>
         </div>
    <!-- End of Action Button -->

    
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" ></script>

</x-app-layout>
