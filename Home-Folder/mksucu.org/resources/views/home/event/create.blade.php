<x-app-layout>

    <!--================== Content Head =========================-->
     <x-content-head link="{{route('events.index')}}" link-name="Back to Events " content-title="Create Event"></x-content-head>

     <!--================== End of Content Head =========================-->

  <form method="post" enctype="multipart/form-data" action="{{route('events.store')}}" id="formElem">
    @csrf
   <div class="text_field">
    <input type="text" name="subject" id="subject" required autocomplete="off" />
     <label for="subject">Title of the Event</label>
  </div>

<!--
    <div class="text_field">
    <input type="datetime-local" name="subject" id="subject" required autocomplete="off" />
       <label for="subject">Date of the Event</label>
  </div>
  -->

  <div class="text_field">
    <input type="text" name="description" id="description" required autocomplete="off"/>
      <label for="description">Description of the Event</label>
  </div>

 <div class="image-upload-section">   
    <label for="url">
    <div class="flex align-items-center">
     <x-icon type="camera" icon="camera"></x-icon> Select a poster 
     </div>
     </label>
    <input type='file' name="url" class="hidden" required id="url" style="display:none"/>
  </div>

  <x-button> <i class="icon-save"></i>  Save Changes</x-button>
  </form>


  <x-form-eleso method="POST" request-url="{{route('events.store')}}" redirect-url=""></x-form-eleso>

</x-app-layout>
