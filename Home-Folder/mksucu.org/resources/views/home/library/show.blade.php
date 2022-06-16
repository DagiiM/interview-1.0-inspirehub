<style>
.search-none{
    display:none;
}
</style>
<x-app-layout>
         <!--================== Content Head =========================-->
     <x-content-head link="{{route('libraries.create')}}" link-name="Create New Library" content-title="Library"></x-content-head>

     <!--================== End of Content Head =========================-->
  
  <x-table>
  <x-slot name="caption">
            Library
        </x-slot>
    <x-slot name="th">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th>Features</th>
        <th scope="col">Actions</th>
    </x-slot>

    <tr>
        <th scope="row">{{$data->id}}</th>
        <td scope="col"> {{$data->name}}</td>
        <td scope="col">{{$data->description}} </td>
         <td>
            @can('ability-create')
              <a href="{{route('libraries.ebooks.create',$data)}}" aria-pressed="true">
                Add Ebook
              </a>
            @endcan
      </td>
      <!-- Action Button -->
         <x-action-button view-link="{{route('libraries.show',['library'=>$data])}}" edit-link="{{route('libraries.edit',['library'=>$data])}}" delete-link="{{route('libraries.destroy',['library'=>$data])}}">    
         </x-action-button>
    <!-- End of Action Button -->
      </tr>
  </x-table>

</x-app-layout>
