<x-app-layout>

     <!--================== Content Head =========================-->
     <x-content-head link="{{route('images.index')}}" link-name="Back to images" content-title="Swap Image"></x-content-head>

     <!--================== End of Content Head =========================-->

  <form method="post" enctype="multipart/form-data" action="{{route('images.update',$data)}}" id="formElem">
    @csrf
  <section class="text_field">
    <input name="subject" type="text" id="subject" autocomplete="off" value="{{$data->subject}}" autofocus required/>
        <label id="subject">Modify Title of the Image</label>
     </section>
  <section class="image-upload-section">
    <input name="image" type="file" id="image" value="{{$data->image}}" required style="display:none"/>
      <label for="image" style="padding-inline:10px"><i class="icon-image-v"></i> Swap Image - <b>{{$data->image}}</b></label>
    </section>

    <x-button><i class="icon-save"></i>Save Changes</x-button>
  </form>

  <x-form-eleso method="POST" request-url="{{route('images.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>