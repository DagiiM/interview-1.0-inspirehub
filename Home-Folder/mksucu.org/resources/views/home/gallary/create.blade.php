<x-app-layout>

    <!--================== Content Head =========================-->
     <x-content-head link="{{route('gallaries.index')}}" link-name="Back to Gallary " content-title="Upload a Photo"></x-content-head>

     <!--================== End of Content Head =========================-->

  <form method="post" enctype="multipart/form-data" action="{{route('gallaries.store')}}" id="formElem">
    @csrf
   <section class="text_field">
    <input type="text" name="subject" id="subject" autocomplete="off" required />
     <label for="subject">Enter Title of the Image</label>
     </section>

       <section class="image-upload-section">
        <section class="image__preview">
           <img id="image__preview">
    </section>
     <input type="file" name="url" required id="attachment" style="display:none"/>
 <label style="margin-bottom:0px;display:block;cursor:pointer;" for="attachment">
 <div class="flex align-items-center">
    <i class="icon-camera"></i>
    Select a Photo 
    </div>
   </label>
 </section>

    <x-button> <i class="icon-camera-plus"></i>Upload Photo</x-button>
  </form>

    <x-form-eleso method="POST" request-url="{{route('gallaries.store')}}" redirect-url=""></x-form-eleso>

</x-app-layout>
