<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            All Classes
        </x-slot:h2>
        <x-slot:button>
            <a href="{{ route('darasas.create') }}" class="app-link">  Create Class</a>
        </x-slot:button>
    </x-main-sub-heading>

    <x-table>
        <x-slot:caption>
            All Classes
        </x-slot:caption>

        <x-slot:th>
            <th>Class Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </x-slot:th>
        @foreach($data as $darasa)
            <tr>
                <td>{{$darasa->name}}</td>
                <td>{{$darasa->description}}</td>
                <td class="flex align-items-center justify-space-around">
                    <div class="status status--{{$darasa->status == 1 ? 'active' : 'trash'}}">
                        {{$darasa->status == 1 ? 'open' : 'closed'}}
                    </div>
                    
                        <a href="{{ route('darasas.students.index',$darasa) }}" class="status status--active">Students</a>
                        <a href="{{ route('darasas.attendances.index',$darasa) }}" class="status status--active">Attendances</a>
                <td>
                    <x-action>
                        <x-slot:viewLink>{{route('darasas.show',$darasa)}}</x-slot:viewLink>
                        <x-slot:editLink>{{route('darasas.edit',$darasa)}}</x-slot:editLink>
                        <x-slot:deleteLink>{{route('darasas.destroy',$darasa)}}</x-slot:deleteLink>
                    </x-action>

                </td>
            </tr>
        @endforeach


    </x-table>
</x-app-layout>
