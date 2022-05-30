<x-app-layout>
    <x-table>
        <x-slot:caption>
            Attendees
        </x-slot:caption>

        <x-slot:th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Status</th>
        </x-slot:th>
        @foreach($students as $user)
            <tr>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <div class="status status--{{$user->status == 1 ? 'active' : 'pending'}}">{{$user->status == 1 ? 'Verified' : 'pending'}}</div>
                </td>
          
            </tr>
        @endforeach

    </x-table>
</x-app-layout>
