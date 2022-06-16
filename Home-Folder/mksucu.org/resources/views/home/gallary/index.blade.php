 <style>


.list-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-column-gap: 16px;
    grid-row-gap: 30px;
    margin-top: 10px;
}

.vid-list img{
  transition: 1s;
}
.vid-list img:hover{
  filter: grayscale(100%);
  transform: scale(1.1);
}

 </style>

<x-app-layout>
    <link href="{{asset('css/lightbox.min.css')}}" rel="stylesheet">
@can('ability-create')
    <a  href="{{route('gallaries.create')}}"  class="text-decoration-none">
      <div class="flex">
          <div>UPLOAD GALLARY/PHOTO</div>
      </div>
  </a>
  @endcan

  @if($data->count()>0)

              <section class="list-container">
                @foreach($data as $gallary)
              <div class="vid-list" style="background-color:#f3f3f3">
                  <a href="{{asset('./img/'.$gallary->url)}}" data-lightbox="mygallery" data-title="{{$gallary->subject}}">
                    <img class="thumnail" src="{{asset('./img/'.$gallary->url)}}" alt="{{$gallary->subject}}">
                  </a>


                  <div class="vid-info flex" style="justify-content:space-between;margin:5px;">
                        @can('ability-edit')
                          <a class="mr-1 ml-2" class="status status--active" href="{{route('gallaries.edit',['gallary'=>$gallary])}}">
                             <i class="icon-edit-alt"></i> Edit
                          </a>
                          @endcan

                          @can('ability-delete')
                          <a>
                          <form class="" method="post" enctype="multipart/form-data" action="{{route('gallaries.destroy',['gallary'=>$gallary])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="status status--trash">
                              <i class="icon-trash-alt"></i> Delete
                          </button>
                        </form>
                      </a>
                        @endcan
                  </div>
                    </div>
                @endforeach

              </section>

              {{ $data->links()}}
              
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}" ></script>


  @else
    <x-data-empty>
    No Gallaries/Photos Available
    </x-data-empty>
  @endif
</x-app-layout>
