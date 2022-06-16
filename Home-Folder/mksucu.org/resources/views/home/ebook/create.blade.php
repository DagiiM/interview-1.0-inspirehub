<x-app-layout>

     <!--================== Content Head =========================-->
     <x-content-head link="{{route('ebooks.index')}}" link-name="All Ebooks" content-title="Enter all required Details for the Ebook"></x-content-head>

     <!--================== End of Content Head =========================-->
@if($data->count()>0)

  <form method="post" enctype="multipart/form-data" action="{{route('ebooks.store')}}" id="formElem">
    @csrf

      <div class="text_field">
            <input type="text" name="subject" id="subject" autocomplete="off" required/>
            <label for="subject">Enter Title of the Book</label>
      </div>
    
        <label for="grid-state">Select Library in Which Ebook To belong</label>
          <select name="library" id="grid-state" required>
            @foreach($data as $library)
            <option value="{{$library->name}}">{{$library->name}}</option>
            @endforeach
          </select>
          <div class="image-upload-section">
              <label for="url" class="flex" style="padding-inline:5px"> <i class="icon-book-open"></i> Select an Ebook</label>
               <input type='file' name="url" id="url" hidden style="display:none" required/>
        </div>
           
        <div class='flex align-items-center justify-space-between'>
            <x-button type="button" style="--bg-image:linear-gradient(315deg, #fc9842 0%, #fe5f75 74%)">
            <a href="{{route('ebooks.index')}}" style="color:#fff">
            <x-icon type="times" icon="times"></x-icon>Cancel
            </a>
            </x-button>
            <x-button> <i class="icon-top-arrow-from-top"></i> Upload Ebook</x-button>
      </div>

  </form>
  @else

<a href="{{route('libraries.create')}}">
  <x-icon type="add" icon="add"></x-icon>Create Library First
  </a>
  <x-data-empty>No Libraries Defined </x-data-empty>

  @endif

  <x-form-eleso method="POST" request-url="{{route('ebooks.store')}}" redirect-url=""></x-form-eleso>

</x-app-layout>
