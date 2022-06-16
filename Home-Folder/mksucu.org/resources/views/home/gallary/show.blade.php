<x-app-layout>
    <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
    
  <a href="{{route('gallaries.index')}}"  class="text-decoration-none">
    <div class="d-flex ml-2">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
    </svg>
    <p class="ml-2">All Photos/Gallaries </p>
  </div>
</a>
<a href="{{asset('../img/'.$data->url)}}" data-lightbox="mygallary">
<img src="{{asset('../img/'.$data->url)}}" alt="{{$data->subject}}"/>
</a>

@can('ability-delete')
<form method="post" enctype="multipart/form-data" action="{{route('gallaries.destroy',$data)}}">
  @csrf
  @method('DELETE')
  <button type="submit">
  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
  </svg>
</button>
</form>
@endcan


<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" ></script>

</x-app-layout>
