
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('services.index')}}" link-name="Back to Services" content-title="Update Church Service Info"></x-content-head>

     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('services.update',$data)}}" id="formElem" onsubmit="return false;">
    @csrf
    @method('PUT')
    <section class="text_field">
  <input name="subject" value="{{$data->subject}}" type="text" autofocus value="Sunday 1st Service" autocomplete="off" required id="subject" />
   <label for="subject">Modify Name of the Service</label>
     </section>
    <section class="text_field">
  <input name="time" type="text" value="{{$data->time}}" autocomplete="off" required id="time"/>
     <label for="time">Modify Time of the Service</label>
     </section>

     <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>

<x-form-eleso method="POST" request-url="{{route('services.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>