
<x-app-layout>
  <!--================== Content Head =========================-->
  <x-content-head link="{{route('ministries.index')}}" link-name="All Ministries" content-title="Modify the Ministry Details"></x-content-head>

  <!--================== End of Content Head =========================-->


<form method="POST" enctype="multipart/form-data" action="{{route('ministries.update',$data)}}" id="formElem">
  @csrf
  @method('PUT')
  <div class="text_field">
  <input name="name" type="text" value="{{$data->name}}" id="name" autocomplete="off" autofocus required/>
   <label for="name">Modify the name of the ministry</label>
  </div>
 
 <div class="text_field">
  <input name="description" type="text" value="{{$data->description}}" autocomplete="off" required/>
  <label for="description">Modify the ministry description</label>
  </div>
 
  <div class="image-upload-section" style="display:block;padding:5px">


    <a href="{{ asset('../../img/'.$data->image) }}" data-lightbox="mygallary">
      <img src="{{ asset('../../img/'.$data->image) }}" style="width:300px;height:350px;padding:5px 0" alt="{{$data->subject}}"/>
    </a>
        <div style="border:1px solid var(--first-color);border-radius:var(--app-br);cursor:pointer;display:block;">
          <label for="image">
            <i class="icon-scenery"></i> Replace Ministry Image
          </label>
          <input type='file' name="image" class="hidden" value="{{$data->image}}" id="image" style="display:none" />
        </div>
  </div>

  <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>

  <x-form-eleso method="POST" request-url="{{route('ministries.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
