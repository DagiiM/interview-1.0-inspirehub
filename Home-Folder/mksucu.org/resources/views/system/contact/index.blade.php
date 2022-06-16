
<x-app-layout>
     <!--================== Content Head =========================-->
     <x-content-head link="{{route('contacts.create')}}" link-name=" Create New Support Contact" content-title="Communication Contacts"></x-content-head>

     <!--================== End of Content Head =========================-->
      @if($data->count()>0)
    <x-table>
        <x-slot name="caption">
            Communication Contacts
        </x-slot>
        <x-slot name="th">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Actions</th>
      </x-slot>


        @foreach($data as $contact)
            <tr>
              <th scope="row">{{$contact->id}}</th>
              <td scope="col"> {{$contact->name}}</td>
              <td scope="col"> <a href="tel:{{$contact->mobile}}">{{$contact->mobile}}</a> </td>

      <!-- Action Button -->
         <x-action-button view-link="{{route('contacts.show',$contact->id)}}" edit-link="{{route('contacts.edit',$contact->id)}}" delete-link="{{route('contacts.destroy',$contact->id)}}"></x-action-button>
    <!-- End of Action Button -->
        </tr>

        @endforeach

    </x-table>
      {{ $data->links()}}
</div>
  @else
    <x-data-empty>
     No Contacts Available
    </x-data-empty>
  @endif

</x-app-layout>

