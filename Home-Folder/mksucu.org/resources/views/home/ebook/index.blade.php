<x-app-layout>

       <!--================== Content Head =========================-->
     <x-content-head link="{{route('ebooks.create')}}" link-name="Upload New Ebook" content-title="List of Ebooks"></x-content-head>

     <!--================== End of Content Head =========================-->

@if($data->count()>0)
  <x-table>
  <x-slot name="caption">
      All Ebooks of the System
  </x-slot>

    <x-slot name="th">
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Features</th>
        <th scope="col">Actions</th>
    </x-slot>
   
  @foreach($data as $ebook)
    <tr>
        <th scope="row">{{$ebook->id}}</th>
        <td>{{$ebook->subject}}</td>
        <td>
              <a href="{{route('ebooks.libraries.index',$ebook->id)}}">
                Library
            </a>
              <a href="{{route('ebooks.show',$ebook->id)}}">
                <x-icon icon="show" type="show"></x-icon>
            </a>
      
          </td>
  <!-- Action Button -->
         <x-action-button button-id="{{$ebook->id}}" view-link="" edit-link="{{route('ebooks.edit',$ebook->id)}}" delete-link="{{route('ebooks.destroy',$ebook->id)}}">    
         </x-action-button>
    <!-- End of Action Button -->
      </tr>
 

  @endforeach


  </x-table>
  {{ $data->links()}}

  @else
  <x-data-empty> No Ebooks Available</x-data-empty>
  @endif
</x-app-layout>
