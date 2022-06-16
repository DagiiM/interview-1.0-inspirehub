<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('socials.create')}}" link-name=" Create New Social Link" content-title="These are external links to social network profiles"></x-content-head>

     <!--================== End of Content Head =========================-->
      @if($data->count()>0)
    <x-table>
        <x-slot name="caption">
            External links
        </x-slot>
        <x-slot name="th">
          <th scope="col">#</th>
          <th scope="col">Social Network Link</th>
          <th scope="col">Name</th>
          <th scope="col" class="app-center">Actions</th>
      </x-slot>


        @foreach($data as $social)
            <tr>
              <th scope="row">{{$social->id}}</th>
              <td>{{$social->url}}</td>
              <td> <a href="{{$social->url}}">{{$social->name}}</a></td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('socials.show',$social->id)}}" edit-link="{{route('socials.edit',$social->id)}}" delete-link="{{route('socials.destroy',$social->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

        @endforeach

    </x-table>
      {{ $data->links()}}
</div>
  @else
    <x-data-empty>
      No Social Links Available
    </x-data-empty>
  @endif

</x-app-layout>

