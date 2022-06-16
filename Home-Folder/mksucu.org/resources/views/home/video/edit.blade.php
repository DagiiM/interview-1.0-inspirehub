<x-app-layout>

  <!--================== Content Head =========================-->
  <x-content-head link="{{route('videos.index')}}" link-name="Back to Videos " content-title="Video Upload Center"></x-content-head>

  <!--================== End of Content Head =========================-->

  @if($ministries->count()>0)

    <p class="hide"> <img alt="loading" src="{{asset('../img/loader.gif')}}"/> Uploading...</p>

  <form  class="dagii-upload-form" method="post" enctype="multipart/form-data" action="{{route('videos.update',$data)}}" id="formElem">
    @csrf
    @method('PUT')

 <label style="margin-bottom:0px;" for="poster">A Poster Makes A video Stand out. Edit Poster below.</label>
  <input type="file" name="poster" placeholder="What is the title of the Video?" required id="poster" value="{{$data->poster}}"/>
   <label for="subject">Edit Video Title</label>
  <input type="text" name="subject" placeholder="What is the title of the Video?" id="subject" required value="{{$data->subject}}"/>
  <label for="description">Edit Video Description</label>
  <textarea type="text" name="description" placeholder="Please add a description of the Video" required id="description" value="{{$data->description}}"></textarea>

  <label for="url"><x-icon type="video" icon="video"></x-icon>Select a Video to Swap With</label>
<input type='file' name="url" class="hidden" id="url" required value="{{$data->url}}" />
<section class="progress-bar">
     <div class="progress" id="progress">0</div>
 </section>

  <x-button> <x-icon type="upload-alt" icon="upload-alt"></x-icon>Update Video Details</x-button>

  </form>
  @else

   <p style="color:orange">You have No Ministry Defined.<br>Hint:Check Whether there are Ministries and if so, join the ministry you want to post a video!</p>
<br>
<a href="{{route('users.ministries.create',['user'=>$user])}}" class="flex-div ml-2">
 <div class="flex">
      <x-icon type="add" icon="add"></x-icon>
      <div>Join A Ministry</div>
    </div>
    </a>

  @endif

    <script>
  const preview = document.querySelector('.preview');

 formElem.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch("{{route('images.store')}}", {
      method: 'POST',
      body: new FormData(formElem)
    });

    let result = await response.json();
   
    flash(result.type, result.message);

 };

</script>
</x-app-layout>

