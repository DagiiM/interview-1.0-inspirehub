<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('libraries.index')}}" link-name="All Libraries" content-title="Enter all required Details for the Library Creation"></x-content-head>

     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('libraries.store')}}" id="formElem">
  @csrf
 <section class="text_field">
  <input name="name" type="text" autofocus autocomplete="off" required/>
  <label for="name">Name of the Library</label>
 </section>
<section class="text_field">
  <input name="description" type="text" autocomplete="off" required/>
   <label for="description">Write Library Description</label>
 </section>
 <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>

  <x-form-eleso method="POST" request-url="{{route('libraries.store')}}" redirect-url=""></x-form-eleso>


</x-app-layout>
