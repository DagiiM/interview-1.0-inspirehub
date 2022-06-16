<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('roles.index')}}" link-name="Back to Roles" content-title="Edit a Role and Assign Abilities"></x-content-head>

     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('roles.update',$data)}}" id="formElem">
      @csrf
      @method('PUT')

<section class="text_field">
    <input name="name" type="text" id="name" autofocus value="{{$data->name}}" spellcheck="false" autocomplete="off" required/>
       <label for="name">Name of the Role</label>
    </section>

   <section class="text_field">
    <input name="description" type="text" required id="description" value="{{$data->description}}" autocomplete="off" required/>
        <label for="description">Description of the Role</label>
   </section>

   <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>

  <x-form-eleso method="POST" request-url="{{route('roles.update',$data)}}" redirect-url=""></x-form-eleso>
  
</x-app-layout>
