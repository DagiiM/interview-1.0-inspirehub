<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('libraries.ebooks.index',$data)}}" link-name="{!!$data->name!!} Ebooks" content-title="Enter all required Details for the Ebook"></x-content-head>

     <!--================== End of Content Head =========================-->

  <form method="post" enctype="multipart/form-data" action="{{route('libraries.ebooks.store',$data)}}" id="formElem">
    @csrf

 <div class="text_field">
        <input type="text" name="subject" id="subject" autocomplete="off" required/>
        <label for="subject">Enter Title of the Book</label>
  </div>

  
    <div class="image-upload-section">
        <label for="url"><i class="icon-book-open "></i>Select an Ebook</label>
        <input type='file' name="url" id="url" hidden style="display:none" required/>
  </div>

    <x-button><i class="icon-save"></i>Save Changes</x-button>
 
  </form>


  <x-form-eleso method="POST" request-url="{{route('libraries.ebooks.store',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
