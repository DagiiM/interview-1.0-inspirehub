<x-app-layout>
  <!--================== Content Head =========================-->
  <x-content-head link="{{route('users.roles.index',$user)}}" link-name="Roles Assigned" content-title="Select A Role To Assign"></x-content-head>

  <!--================== End of Content Head =========================-->

  @if($data->count()>0)
<form method="post" enctype="multipart/form-data" action="{{route('users.roles.store',$user)}}" id="formElem" >
  @csrf
  <section class="text_field">
    <select name="role"  required>
      @foreach($data as $role)
      <option value="{{$role->name}}">{{$role->name}}</option>
      @endforeach
    </select>
    </section>
    <button class="btn-primary" style="height:40px;width:20%;max-width:150px;">Assign Selected Role </button>
    </div>
    </form>
    @else
    <x-data-empty>No Roles Available To Assign</x-data-empty>

    @endif

</x-app-layout>
