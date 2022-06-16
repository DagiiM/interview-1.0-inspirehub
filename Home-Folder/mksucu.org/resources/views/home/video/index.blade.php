<x-app-layout>
<style>
.vid-list{
   max-width:300px;
   
    border-radius: 5px;
}
.vid-list .thumnail{
    width: 100%;
}

@media(max-width:480px){
  .vid-list{
    min-width:100%;
    max-width:100%;
  }
}

.vid-list .flex {
    align-items: flex-start;
    margin-top: 7px;
    justify-content:space-between;
}

.vid-list .flex img {
    width: 35px;
    margin-right: 10px;
    border-radius: 50%;
}


.vid-list .thumnail {
    width: 100%;
    height: 300px;
    border-radius: 5px;
}

.banner-video {
    width: 100%;
}

.banner-video img {
    width: 100%;
    max-height: 350px;
    border-radius: 8px;
}

.list-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-column-gap: 16px;
    grid-row-gap: 30px;
    margin-top: 10px;
}
</style>

      <!--================== Content Head =========================-->
      <x-content-head link="{{route('videos.create')}}" link-name="Upload Video" content-title="Video Homepage"></x-content-head>

      <!--================== End of Content Head =========================-->

 <!--======================== Search form ==================================-->
 <x-search placeholder="Search from Videos"></x-search>
 <!--======================== End of Search form ===========================-->
<section class="list-container">
@if($data->count()>0)

@foreach($data as $video)

<article class="vid-list">
    <a href="{{route('videos.show',$video->id)}}">
    <img src="{{asset('img/'.$video->poster)}}" class="thumnail"/>
      </a>
    <div class="flex">
    <div class="flex">
         <img src="{{asset('/img/'.$user->picture)}}" alt=""/>

      <div class="vid-info">
        <a href="{{route('videos.show',$video->id)}}">{{$video->description}}</a>
        <p>{{$video->subject}}</p>
        <p>15k Views</p> 
      </div>
      </div>

    <div class="flex">
      <div class="icon more-icon" style="margin-right:0;margin-left:20%;display:none">
          <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
      </div>

      @can('ability-edit')
      <a href="{{route('videos.edit',$video->id)}}">
          <button type="submit">
             <x-icon icon="edit" type="edit"></x-icon>
          </button>
    </a>
    @endcan

      @can('ability-delete')
        <form method="POST" action="{{route('videos.destroy',$video->id)}}">
          @csrf
          @method('DELETE')
          <button type="submit">
            <x-icon icon="delete" type="delete"></x-icon>
          </button>
      </form>
    @endcan
    </div>

    </div>
</article>

@endforeach
@else
    <x-data-empty>No Videos Uploaded Yet</x-data-empty>
@endif

</section>

</x-app-layout>