<x-app-layout>

     <!--================== Content Head =========================-->
     <x-content-head link="{{route('images.index')}}" link-name="Back to images" content-title="Add Image"></x-content-head>

     <!--================== End of Content Head =========================-->

  <form method="post" enctype="multipart/form-data" action="{{route('images.store')}}" id="formElem">
    @csrf
  <section class="text_field">
    <input name="subject" type="text" id="subject" autocomplete="off" autofocus required/>
        <label id="subject">Title of the Image</label>
     </section>
  <section class="image-upload-section">
  <section class="image__preview">
           <img id="image__preview">
    </section>
    <input name="image" type="file" id="attachment" required style="display:none"/>
      <label for="attachment" style="padding-inline:10px">
        <i class="icon-image-v"></i> Select Image to Upload</label>
    </section>

    <section class="preview"></section>
    <x-button><i class="icon-save"></i>Save Changes</x-button>
  </form>

  <x-form-eleso method="POST" request-url="{{route('images.store')}}" redirect-url=""></x-form-eleso>

</x-app-layout>
