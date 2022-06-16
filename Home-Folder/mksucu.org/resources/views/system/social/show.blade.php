<style>
.search-none{
    display:none;
}
</style>
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('socials.index')}}" link-name="Back to Social Links" content-title="External Social Media Link"></x-content-head>

     <!--================== End of Content Head =========================-->
   
    <x-table>
        <x-slot name="caption">
            Social Media Link
        </x-slot>
        <x-slot name="th">
            <th>#</th>
            <th scope="col">Social Network Link</th>
            <th>Name</th>
            <th scope="col">Actions</th>
      </x-slot>

            <tr>
               <th>{{$data->id}}</th>
               <td>{{$data->url}}</td>
               <td> <a href="{{$data->url}}">{{$data->name}}</a></td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('socials.show',$data->id)}}" edit-link="{{route('socials.edit',$data->id)}}" delete-link="{{route('socials.destroy',$data->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

    </x-table>

</x-app-layout>


