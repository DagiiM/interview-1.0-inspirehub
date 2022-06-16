<x-app-layout>

     <!--================== Content Head =========================-->
     <x-content-head link="{{route('contacts.index')}}" link-name="Back to All Contacts" content-title="Add Support Contact"></x-content-head>
     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('contacts.store')}}" id="formElem">
  @csrf
  <section class="text_field">
      <input name="name" type="text" autofocus value="Douglas M" required id="name"/>
      <label for="name">Name of the User</label>
  </section>
  <section class="text_field">
      <input name="mobile" type="tel" value="+254799115309" required id="mobile"/>
      <label for="mobile">Enter Mobile Number</label>
 </section>
 <x-button><i class="icon-save"></i>Save Changes</x-button>
</form>

<x-form-eleso method="POST" request-url="{{route('contacts.store')}}" redirect-url=""></x-form-eleso>


</x-app-layout>
