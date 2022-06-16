<x-app-layout>

  <!--================== Content Head =========================-->
  <x-content-head link="{{route('abilities.index')}}" link-name="All Abilities" content-title="Create an Ability/Permission"></x-content-head>

  <!--================== End of Content Head =========================-->
<form method="post" enctype="multipart/form-data" action="{{route('abilities.store')}}" id="formElem">
  @csrf
    <section class="text_field">
        <input name="name" type="text" autofocus required autocomplete="off" id="name"/>
        <label id="name">Name of the Ability</label>
    </section>

  <section class="text_field">
  <input name="description" type="text" autocomplete="off" required id="description"/>
    <label for="description">Description of the Ability</label>
     </section>
  <x-button>
      Save Changes
  </x-button>
</form>
  <x-form-eleso method="POST" request-url="{{route('abilities.store')}}" redirect-url=""></x-form-eleso>


</x-app-layout>
