
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('themes.create')}}" link-name=" Create New Theme" content-title=""></x-content-head>

     <!--================== End of Content Head =========================-->
      @if($data->count()>0)
    <x-table>
        <x-slot name="caption">
            Themes and Semesters
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Semester</th>
            <th scope="col">Theme of the Semester</th>
            <th scope="col" class="app-center">Actions</th>
      </x-slot>


        @foreach($data as $theme)
            <tr>
                <td>{{$theme->id}}</td>
                <td>{{$theme->semester}}</td>
                <td>{{$theme->subject}}</td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('themes.show',$theme->id)}}" edit-link="{{route('themes.edit',$theme->id)}}" delete-link="{{route('themes.destroy',$theme->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

        @endforeach

    </x-table>
      {{ $data->links()}}
</div>
  @else
    <x-data-empty>
      No Themes So Far
    </x-data-empty>
  @endif

</x-app-layout>

