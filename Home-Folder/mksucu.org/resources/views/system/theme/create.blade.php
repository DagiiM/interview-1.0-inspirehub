<x-app-layout>
      <!--================== Content Head =========================-->
     <x-content-head link="{{route('themes.index')}}" link-name="Back to Themes " content-title="Semester Details Creation"></x-content-head>

     <!--================== End of Content Head =========================-->


<form method="post" enctype="multipart/form-data" action="{{route('themes.store')}}" id="formElem">
  @csrf
  <section class="text_field">
    <input name="semester" type="text" autofocus autocomplete="off" required  spellCheck="off" id="semester"/>
      <label for="semester">What is the Semester ?</label>
  </section>
    <section class="text_field">
  <input name="subject" type="text" autocomplete="off" id="subject" required/>
      <label for="subject">Theme of the Semester</label>
  </section>

      
  <x-button><i class="icon-save"></i>Save Changes</x-button>
</form>

<x-form-eleso method="POST" request-url="{{route('themes.store')}}" redirect-url=""></x-form-eleso>


</x-app-layout>
