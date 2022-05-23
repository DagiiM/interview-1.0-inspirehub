<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            All Abilities/Permissions
        </x-slot:h2>
        <x-slot:button>
            <a href="{{ route('abilities.create') }}" class="app-link">  Create Ability/Permission</a>
        </x-slot:button>
    </x-main-sub-heading>


    <x-table>
        <x-slot:caption>
            All Classes
        </x-slot:caption>

        <x-slot:th>
            <th>Class Name</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Actions</th>
        </x-slot:th>
        @foreach($data as $ability)
            <tr>
                <td>{{$ability->name}}</td>
                <td>{{$ability->description}}</td>
                <td class="flex align-items-center justify-space-around">
                    <div class="status status--{{$ability->priority == 'Core' ? 'active' : 'pending'}}">
                        {{$ability->priority == 'Core' ? 'Core' : $ability->priority}}
                    </div>
                    
                <td>
                    <x-action>
                        <x-slot:viewLink>{{route('abilities.show',$ability)}}</x-slot:viewLink>
                        <x-slot:editLink>{{route('abilities.edit',$ability)}}</x-slot:editLink>
                        <x-slot:deleteLink>{{route('abilities.destroy',$ability)}}</x-slot:deleteLink>
                    </x-action>

                </td>
            </tr>
        @endforeach


    </x-table>
</x-app-layout>
