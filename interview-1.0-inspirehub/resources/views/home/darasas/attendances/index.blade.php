<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            Attendance Lists
        </x-slot:h2>
        <x-slot:button>
            <a href="{{ route('darasas.attendances.create',$darasa) }}" class="app-link">Create Attendance List</a>
        </x-slot:button>
    </x-main-sub-heading>


    <x-table>
        <x-slot:caption>
            
        </x-slot:caption>

        <x-slot:th>
            <th>Attendance Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </x-slot:th>
        @foreach($attendances as $attendance)
            <tr>
                <td>{{$attendance->name}}</td>
                <td>{{$attendance->description}}</td>
                <td class="flex align-items-center justify-space-around">
                    <div class="status status--{{$attendance->status == 'open' ? 'active' : 'trash'}}">
                        {{$attendance->status == 'open' ? 'open' : 'closed'}}
                    </div>
                    
                        <a href="{{ route('darasas.attendances.students.create',[$darasa,$attendance]) }}" class="status status--active">Mark Attendance</a>
                        <a href="{{ route('darasas.attendances.students.index',[$darasa,$attendance]) }}" class="status status--active">Attendees</a>
                <td>
                    <x-action>
                        <x-slot:viewLink>{{route('darasas.attendances.show',[$darasa,$attendance])}}</x-slot:viewLink>
                        <x-slot:editLink>{{route('darasas.attendances.edit',[$darasa,$attendance])}}</x-slot:editLink>
                        <x-slot:deleteLink>{{route('darasas.attendances.destroy',[$darasa,$attendance])}}</x-slot:deleteLink>
                    </x-action>

                </td>
            </tr>
        @endforeach


    </x-table>
</x-app-layout>