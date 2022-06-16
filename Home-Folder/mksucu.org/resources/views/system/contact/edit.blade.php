<x-app-layout>

     <!--================== Content Head =========================-->
     <x-content-head link="{{route('contacts.index')}}" link-name="Back to All Contacts" content-title="update Support Contact"></x-content-head>
     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('contacts.update',$data)}}" id="formElem">
  @csrf
  @method('PUT')
  <section class="text_field">
      <input name="name" type="text" value="{{$data->name}}" autofocus autocomplete="off" required id="name"/>
      <label for="name">Modify Name of the User</label>
  </section>
  <section class="text_field">
      <input name="mobile" type="tel" value="{{$data->mobile}}" required autocomplete="off" id="mobile"/>
      <label for="mobile">Modify Mobile Number</label>
 </section>

 <x-button><i class="icon-save"></i>Save Changes</x-button>
</form>

<x-form-eleso method="POST" request-url="{{route('contacts.update',$data)}}" redirect-url=""></x-form-eleso>


</x-app-layout>
