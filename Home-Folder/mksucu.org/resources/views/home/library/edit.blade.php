<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('libraries.index')}}" link-name="All Libraries" content-title="Update Library Information"></x-content-head>

     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('libraries.update',$data)}}" id="formElem">
  @csrf
   @method('PUT')

<section class="text_field">
  <input name="name" type="text" value="{{$data->name}}" autofocus required/>
    <label for="name">Modify Name of the Library</label>
  </section>
<section class="text_field">
  <input name="description" type="text" value="{{$data->description}}" required/>
     <label for="description">Modify Library Description</label>
  </section>
  <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>

  <x-form-eleso method="POST" request-url="{{route('libraries.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
