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
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td class="flex align-items-center justify-space-around">
                    <div class="status status--{{$data->status == 1 ? 'active' : 'trash'}}">
                        {{$data->status == 1 ? 'open' : 'closed'}}
                    </div>
                    
                        <a href="{{ route('darasas.students.index',$data) }}" class="status status--active">Students</a>
                        <a href="{{ route('darasas.attendances.index',$data) }}" class="status status--active">Attendances</a>
                <td>
                    <x-action>
                        <x-slot:viewLink>{{route('darasas.show',$data)}}</x-slot:viewLink>
                        <x-slot:editLink>{{route('darasas.edit',$data)}}</x-slot:editLink>
                        <x-slot:deleteLink>{{route('darasas.destroy',$data)}}</x-slot:deleteLink>
                    </x-action>

                </td>
            </tr>


    </x-table>
</x-app-layout>
