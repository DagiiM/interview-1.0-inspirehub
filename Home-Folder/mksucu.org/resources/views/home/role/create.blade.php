<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('roles.index')}}" link-name="Back to Roles" content-title="Create a Role and Assign Abilities"></x-content-head>

     <!--================== End of Content Head =========================-->

@if($data->count()>0)
<form method="post" enctype="multipart/form-data" action="{{route('roles.store')}}" id="formElem">
  @csrf
  <section class="text_field">
    <input name="name" type="text" id="name" autofocus spellcheck="false" autocomplete="off" required/>
       <label for="name">Name of the Role</label>
    </section>

   <section class="text_field">
    <input name="description" type="text" required id="description" autocomplete="off" required/>
        <label for="description">Description of the Role</label>
   </section>

<ul>

  <h2 style="text-align:center">Select an Ability to Attach to The Role</h2>
    @foreach($data as $ability)
    <li>
  <input type="checkbox" name="ability_select[]" value="{{$ability->id}}" id="check">
      <label for="check">{{$ability->name}}</label>
    </li>
    @endforeach

    </ul>

    <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>

  <x-form-eleso method="POST" request-url="{{route('roles.store')}}" redirect-url=""></x-form-eleso>

@else
<p> No Abilities Available.
   <a style="color:blue;" href="{{route('abilities.create')}}">Create Ability, </a>
   Then Get back here to proceed With Role Creation.
 </p>
  @endif

</x-app-layout>
