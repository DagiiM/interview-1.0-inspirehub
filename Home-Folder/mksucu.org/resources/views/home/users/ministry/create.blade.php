
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('users.ministries.index',$user)}}" link-name="My Ministries" content-title="Select A Ministry To Join"></x-content-head>

     <!--================== End of Content Head =========================-->

  @if($data->count()>0)
<form method="post" enctype="multipart/form-data" action="{{route('users.ministries.store',$user)}}" id="formElem">
  @csrf
  <section class="text_field">
    <select name="ministry" required>
      @foreach($data as $ministry)
      <option>{{$ministry->name}}</option>
      @endforeach
    </select>
    </section>
    <button type="submit" class="btn-primary" style="height:35px">
          Join Selected Ministry
    </button>

    </form>
    @else
    <x-data-empty>No Ministries Available</x-data-empty>

    @endif

</x-app-layout>
