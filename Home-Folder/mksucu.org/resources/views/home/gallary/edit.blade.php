
<x-app-layout>
@can('ability-list')
  <a href="{{route('gallaries.index')}}"  class="text-decoration-none app-center">
    <i class="icon-camera"></i>All Photos/Gallaries 
</a>
@endcan

  <form method="POST" enctype="multipart/form-data" action="{{route('gallaries.update',$data)}}" id="formElem">
    @csrf
    @method('PUT')
    <div class="text_field">
    <input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="subject" placeholder="Enter Subject" value="{{$data->subject}}" />
    <label for="subject">Rename Image ?</label>
 </div>
        <div>
          <div>
          <img src="../../img/{{$data->url}}" style="width:300px;height:350px;" alt="{{$data->subject}}"/>
        </div>
    
      <section class="image-upload-section">
          <input type="file" name="url" required id="url" style="display:none"/>
          <label style="margin-bottom:0px;display:block" for="url">
          <i class="icon-camera-plus"></i>
          Select a Photo to Replace</label>
 </section>

    <x-button> <i class="icon-edit-alt"></i> Update Photo Details</x-button>
  </div>

  </form>

     <x-form-eleso method="POST" request-url="{{route('gallaries.update',$data)}}" redirect-url=""></x-form-eleso>
</x-app-layout>
