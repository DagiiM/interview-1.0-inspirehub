<x-app-layout>

<style>
.modal-custom{
  position:absolute;
  background-color:var(--app-bg-color);
  width:80%;
  max-width:480px;
  box-shadow:var(--app-box-shadow);
  border-radius:var(--app-br);
  z-index:100;
  display:none !important;
}

@media (max-width:480px){
  .modal-custom{
    width:94%;
    max-width:100%;
  }
}

.modal-header,.modal-footer{
  display:flex;
  align-items:center;
  justify-content:space-between;
  background-color:#f3f3f3;
  padding:3px 10px;
}
.modal-header{
  border-bottom:1px solid #f3f3f3;
}
.modal-footer{
  border-top:1px solid #f3f3f3;
}

</style>

  <!--================== Content Head =========================-->
  <x-content-head link="{{route('ministries.index')}}" link-name="All Ministries" content-title="The Email Will be Sent to All Ministry Members"></x-content-head>

  <!--================== End of Content Head =========================-->


@if ($emails->count()>0)
<!-- Button trigger modal -->
<x-button type="button" data-toggle="modal" data-target="#exampleModal" style="width:20%;min-width:135px;--icon-color:#fff;display:none">
  <x-icon icon="show" type="show"></x-icon>
  Member Emails
</x-button>

<!-- Modal -->
<form method="post" enctype="multipart/form-data" action="{{route('emails.store')}}" id="formElem">
  @csrf
<div class="modal-custom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bulk Email {{$emails->count()}} Receipients Addresses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <x-icon type="times" icon="times"></x-icon>
        </button>
      </div>
      <div class="modal-body" style="padding: 5px;">

        @foreach($emails as $email)
        <div class="flex" style="width:100%;display:content;color:var(--text-color)">
              <input type="checkbox" name="email[]" value="{{$email}}" id="gridCheck" checked>
              <label class="form-check-label ml-2" style="font-size:14px;margin-left:1%" for="gridCheck">{{$email}}  </label>
        </div>
        @endforeach

      </div>
      <div class="modal-footer">
        <x-button type="button">Save changes</x-button>
      </div>

    </div>
  </div>
</div>



    <div class="grid grid-cols-1 mx-7">
 
    <section class="text_field">
        <input name="subject"  type="text" required autocomplete="off"/>
         <label for="subject">Enter Email Subject</label>
   </section>

     <section class="text_field" style="margin:0;padding:0;width:99%;">
       <!-- <input name="message" type="text" required autocomplete="off"/> -->
     
         <textarea name="message" id="editor" placeholder="Compose Broadcast Email Message Here" style="display:none;"></textarea>
         
   </section>

   <x-ckeditor></x-ckeditor>

        <section class="image-upload-section">
            <label for="url">
             <div class="flex align-items-center" style="padding-inline:10px">
               <i class="icon-image-v"></i> 
              Select a file to attach
            </div>
            </label>
            <input type='file' name="url" class="hidden" required id="url" style="display:none"/>
        </section>


    <x-button> <i class="icon-message"></i> Send Email</x-button>
 

      </div>
  </form>

  <x-form-eleso method="POST" request-url="{{route('emails.store')}}" redirect-url=""></x-form-eleso>


  @else
  
    <x-data-empty>No Verified Members Available</x-data-empty>
 
@endif
</x-app-layout>
