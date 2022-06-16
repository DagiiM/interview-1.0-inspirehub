
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('socials.index')}}" link-name="Back to Social Links" content-title="Create external links to Social Media Profiles"></x-content-head>

     <!--================== End of Content Head =========================-->

<form method="post" enctype="multipart/form-data" action="{{route('socials.store')}}" id="formElem">
  @csrf
<section class="text_field">
  <input name="url" id="url" type="url" value="https://facebook.com/elesoconnect" required spellCheck="false" autofocus autocomplete="off"/>
    <x-label for="url"> Enter Social Link Url</x-label>
  </section>
<section class="text_field">
  <input name="name" type="text" id="name" value="{{config('app.developer')}} Facebook Page" required spellCheck="false" autocomplete="off"/>
   <x-label for="name"> Name of the Social Media Platform</x-label>
    </section>
    
  <x-button><i class="icon-save"></i>Save Changes</x-button>

</form>


<x-form-eleso method="POST" request-url="{{route('socials.store')}}" redirect-url=""></x-form-eleso>

</x-app-layout>
