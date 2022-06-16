<x-app-layout>

  <!--================== Content Head =========================-->
  <x-content-head link="{{route('ministries.index')}}" link-name="All Ministries" content-title="Let's Create a Ministry"></x-content-head>

  <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('ministries.store')}}" id="formElem">
  @csrf
  <section class="text_field">
  <input name="name"  type="text" autofocus required autocomplete="off"/>
    <label for="name">Name of the ministry</label>
   </section>

  <section class="text_field">
  <input name="description"  type="text" required autocomplete="off"/>
    <label for="description">Ministry Description</label>
 </section>

 <section class="image-upload-section">
    <section class="image__preview">
           <img id="image__preview">
    </section>
   <label for="attachment" style="display:flex;align-items:center"><x-icon type="camera" icon="camera"></x-icon>Select a Ministry Photo</label>
   <input type='file' name="image" class="hidden" required autocomplete="off" id="attachment" style="display:none"/>
  </section>

  <x-button><i class="icon-save"></i>Save Changes</x-button>
</form>

  <x-form-eleso method="POST" request-url="{{route('ministries.store')}}" redirect-url=""></x-form-eleso>
</x-app-layout>
