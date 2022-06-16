<x-app-layout>

  <!--================== Content Head =========================-->
  <x-content-head link="{{route('emails.index')}}" link-name="All Emails" content-title="Email Communication Center"></x-content-head>

  <!--================== End of Content Head =========================-->
   @if ($emails->count()>0)
  <form method="post" enctype="multipart/form-data" action="{{route('emails.store')}}" id="formElem">
    @csrf
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display:none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bulk Email {{$emails->count()}} Receipients Addresses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 5px;">
    <?php $index=1;?>
   
        @foreach($emails as $email)
        <div style="width:100%;display:content;">
          <input class="ml-2 mb-2 mt-1" type="checkbox" name="email[]" value="{{$email}}" id="gridCheck" checked>
          <label class="form-check-label ml-2" style="font-size:14px" for="gridCheck">{{$email}}  </label>
        </div>
        @endforeach

      </div>
      <div class="modal-footer">
        <x-button>Save changes</x-button>
      </div>
    </div>
  </div>
</div>


    <div class="text_field">
    <input type="text" name="subject" id="subject" required autocomplete="off"/>
    <label for='subject'>Enter the Subject of the Email</label>
    </div>

    <div style="width:95%;padding:0">
    <label for="editor">Write an Expressive Email</label>
    <textarea id="editor" type="text" name="message" placeholder="Compose Broadcast Email Message" required style="display:none;"></textarea>
      <x-ckeditor></x-ckeditor>
      </div>
        <div class='image-upload-section'>
            <label for="url"><x-icon type="camera" icon="camera"></x-icon> Select an Attachment </label>
            <input type='file' name="url" class="hidden" id="url" style="display:none" required/>
        </div>

    <x-button>Send Email To All Verified Members</x-button>

      </div>
  </form>

  @else

    <x-data-empty>No Verified Members Available</x-data-empty>


@endif
</x-app-layout>
