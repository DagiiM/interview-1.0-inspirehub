<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('ebooks.index')}}" link-name="All Ebooks" content-title="Update Details for the Ebook"></x-content-head>

     <!--================== End of Content Head =========================-->

  <form method="post" enctype="multipart/form-data" action="{{route('ebooks.update',$data)}}" id="formElem">
    
     <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
    <input name="_method" type="hidden" value="PUT" id="method">
     <div class="text_field">
    <input type="text" name="subject" id="subject" value="{{$data->subject}}" autocomplete="off"/>
      <label for="subject">Edit Title of the Book</label>
      </div>
    
    <div class="image-upload-section">
       <label for="url"><i class="icon-book-open"></i> Swap the <b>{{$data->url}}</b> Ebook</label>
        <input type='file' name="url" id="url" value="{{$data->url}}" hidden style="display:none" />
        </div>   
        <div class='flex align-items-center justify-space-between'>
            <x-button class="upload-btn" id="btn-submit">  <i class="icon-top-arrow-from-top"></i> Update Ebook</x-button>
      </div>

  </form>

  <x-form-eleso method="POST" request-url="{{route('ebooks.update',$data)}}" redirect-url=""></x-form-eleso>

</x-app-layout>
