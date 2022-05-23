<x-app-layout>
    <x-table>
        <x-slot:caption>
            All Members
        </x-slot:caption>

        <x-slot:th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Status</th>
            <th>Actions</th>
        </x-slot:th>
        @foreach($data as $user)
            <tr>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->designation}}</td>
                <td>
                    <div class="status status--{{$user->status == 1 ? 'active' : 'pending'}}">{{$user->status == 1 ? 'Verified' : 'pending'}}</div>
                </td>
                <td>
                    <x-action>
                        <x-slot:viewLink>{{route('users.show',$user)}}</x-slot:viewLink>
                        <x-slot:editLink>{{route('users.edit',$user)}}</x-slot:editLink>
                        <x-slot:deleteLink>{{route('users.destroy',$user)}}</x-slot:deleteLink>
                    </x-action>

                </td>
            </tr>
        @endforeach


    </x-table>
</x-app-layout>
