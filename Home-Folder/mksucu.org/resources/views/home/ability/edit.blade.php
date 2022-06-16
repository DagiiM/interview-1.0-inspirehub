<x-app-layout>

  <!--================== Content Head =========================-->
  <x-content-head link="{{route('abilities.index')}}" link-name="All Abilities" content-title="Edit Ability/Permission"></x-content-head>

  <!--================== End of Content Head =========================-->
<form method="post" enctype="multipart/form-data" action="{{route('abilities.update',$data)}}" id="formElem">
  @csrf
  @method('PUT')
    <section class="text_field">
        <input name="name" type="text" autofocus required autocomplete="off" id="name" value="{{$data->name}}"/>
        <label id="name">Modify name of the Ability</label>
    </section>

  <section class="text_field">
  <input name="description" type="text" autocomplete="off" required id="description" value="{{$data->description}}"/>
    <label for="description">Modify description of the Ability</label>
     </section>
  <x-button>
      <i class="icon-edit-alt"></i> Update Ability
  </x-button>
</form>
  <x-form-eleso method="POST" request-url="{{route('abilities.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
