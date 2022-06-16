<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('socials.index')}}" link-name="Back to Social Links" content-title="Edit link to Social Media Profiles"></x-content-head>

     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('socials.update',$data)}}" id="formElem">
  @csrf
  @method('PUT')
<section class="text_field">
  <input name="url" id="url" type="url" value="{{$data->url}}" required spellCheck="false" autofocus autocomplete="off"/>
    <x-label for="url"> Modify Social Link Url</x-label>
  </section>
<section class="text_field">
  <input name="name" type="text" id="name" value="{{$data->name}}" required spellCheck="false" autocomplete="off"/>
   <x-label for="name"> Modify Name of the Social Media Platform</x-label>
    </section>
        
  <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>


<x-form-eleso method="POST" request-url="{{route('socials.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
