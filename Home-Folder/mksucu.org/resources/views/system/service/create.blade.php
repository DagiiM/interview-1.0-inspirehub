<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('services.index')}}" link-name="Back to All Church Services" content-title="Create Church Service"></x-content-head>

     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('services.store')}}" onsubmit="return false;" id="formElem">
  @csrf
    <section class="text_field">
  <input name="subject" id="subject"  type="text" autofocus value="Sunday 1st Service" autocomplete="off" required/>
   <label for="subject">Enter Name of the Service</label>
     </section>
    <section class="text_field">
  <input name="time" id="time" type="text" value="7:00am to 10:00am" autocomplete="off" required/>
     <label for="time">Time of the Service</label>
     </section>

     <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>

<x-form-eleso method="POST" request-url="{{route('services.store')}}" redirect-url=""></x-form-eleso>

</x-app-layout>
