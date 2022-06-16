<x-app-layout>

    <!--================== Content Head =========================-->
     <x-content-head link="{{route('events.index')}}" link-name="Back to Events " content-title="Edit Event"></x-content-head>

     <!--================== End of Content Head =========================-->

  <form method="post" enctype="multipart/form-data" action="{{route('events.update',$data)}}" id="formElem">
    @csrf
    @method('PUT')
      <div class="text_field">
    <input type="text" name="subject" id="subject" value="{{$data->subject}}" required />
        <label for="subject">Modify Title of the Event</label>
      </div>

      <div class="text_field">
    <input type="text" name="description" id="description" value="{{$data->description}}" required />
       <label for="description">Modify Description of the Event</label>
      </div>

     <div class="image-upload-section">   
    <label for="url"> 
    <div class="flex align-items-center">
     <x-icon type="camera" icon="camera"></x-icon> Replace Event Poster - <b> {{$data->url}}</b>
     </div>
      </label>
    <input type='file' name="url" class="hidden" id="url" value="{{$data->url}}" style="display:none"/>
      </div>

    <x-button> <i class="icon-edit-alt"></i>  Update Event Details</x-button>
  </form>

  <x-form-eleso method="POST" request-url="{{route('events.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
