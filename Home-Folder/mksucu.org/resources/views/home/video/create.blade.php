<x-app-layout>

  <!--================== Content Head =========================-->
  <x-content-head link="{{route('videos.index')}}" link-name="Back to Videos " content-title="Video Upload Center"></x-content-head>

  <!--================== End of Content Head =========================-->

  @if($ministries->count()>0)

  <form  class="dagii-upload-form" method="post" enctype="multipart/form-data" action="{{route('videos.store')}}" id="formElem" onSubmit="return false;">
    @csrf
     <section class="flex alert-info" style="display:flex;align-items:center;margin-top:5px;padding:5px;font-size:13px;width:95%;border-radius:5px">
      <x-icon type="info" icon="info"></x-icon>
      <div>Every Video is posted in a Ministry Profile. Please Select a Ministry to Add the video to</div>
      </section>
   <section class="text_field">
    <select name="ministry" required id="ministry" style="font-size:15px">
      @foreach($ministries as $ministry)
      <option>{{$ministry->name}}</option>
      @endforeach
    </select>
   </section>

      <section class="flex alert-info" style="display:flex;align-items:center;margin-top:5px;padding:5px;font-size:13px;width:95%;border-radius:5px">
      <x-icon type="info" icon="info"></x-icon>
      <div>A Poster Makes A video Stand out. For Better Sharing, Dimensions should be 1200×630 pixels and not more than 8MB</div>
      </section>

  <section class="image-upload-section">
      <section class="image__preview">
           <img id="image__preview">
    </section>
     <input type="file" name="poster" accept="image/*" required id="attachment" style="display:none"/>
 <label style="margin-bottom:0px;display:block;padding-inline:10px" for="attachment">
 <i class="icon-scenery"></i>
 Select a poster to Add to the video </label>
 </section>

 <section class="text_field">
  <input type="text" name="subject" id="subject" autocomplete="off" required/>
    <label class='flex' for="subject">What is the title of the Video?</label>
    </section>
    
 <section class="text_field">
  <input type="text" name="description" required id="description" autocomplete="off"/>
  <label class='flex' for="description">Please add a description of the Video</label>
  </section>

  <section class="image-upload-section">
    <section class="video__preview">
       <video controls id="video-tag">
        <source id="video-source" src="splashVideo">
        Your browser does not support the video tag.
        </video>
    </section>
     

  <input type='file' name="url" class="hidden" required style="display:none" accept="video/*" id="input-tag"/>
  <label class='flex' for="input-tag"><x-icon type="video" icon="video"></x-icon>Select a Video to Upload</label>
  </section>

  <x-button> Save Changes</x-button>

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

    <x-form-eleso method="POST" request-url="{{route('videos.store')}}" redirect-url="{{route('videos.index')}}"></x-form-eleso>

</x-app-layout>
