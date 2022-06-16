<x-app-layout>
       <!--================== Content Head =========================-->
     <x-content-head link="{{route('libraries.create')}}" link-name="Create New Library" content-title="List of Libraries"></x-content-head>

     <!--================== End of Content Head =========================-->

@if($data->count()>0)
  <x-table>
    <x-slot name="caption">
            All Libraries
        </x-slot>
    <x-slot name="th">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th>Features</th>
        <th scope="col">Actions</th>
    </x-slot>

  @foreach($data as $library)
    <tr>
        <th scope="row">{{$library->id}}</th>
        <td>{{$library->name}}</td>
        <td>{{$library->description}}</td>
   <td>
    @can('ability-create')
      <a href="{{route('libraries.ebooks.create',$library->id)}}" aria-pressed="true">
        Add Ebook
      </a>
    @endcan
    </td>
             <!-- Action Button -->
         <x-action-button view-link="{{route('libraries.show',$library->id)}}" edit-link="{{route('libraries.edit',$library->id)}}" delete-link="{{route('libraries.destroy',$library->id)}}">    
         </x-action-button>
    <!-- End of Action Button -->

      </tr>
  @endforeach
  </x-table>
    {{ $data->links()}}


  @else
        <x-data-empty>No Libraries Available</x-data-empty>
  @endif
</x-app-layout>
