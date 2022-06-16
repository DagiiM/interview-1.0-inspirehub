<x-app-layout>
      <!--================== Content Head =========================-->
     <x-content-head link="{{route('themes.index')}}" link-name="Back to Themes " content-title="Edit Semester Details Creation"></x-content-head>

     <!--================== End of Content Head =========================-->


<form method="post" enctype="multipart/form-data" action="{{route('themes.update',$data)}}" id="formElem">
  @csrf
  @method('PUT')
     <section class="text_field">
    <input name="semester" type="text" autofocus id="semester" value="{{$data->semester}}"/>
      <label for="semester">Edit Semester</label>
     </section>
    <section class="text_field">
  <input name="subject" type="text" id="subject" value="{{$data->subject}}"/>
      <label for="subject">Edit theme of the Semester</label>
   </section>
       
   <x-button><i class="icon-save"></i>Save Changes</x-button>
</form>

<x-form-eleso method="POST" request-url="{{route('themes.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
