<x-app-layout>
    <form action="{{ route('darasas.attendances.students.store',[$darasa,$attendance]) }}" method="POST">
        @csrf
    <x-table>
        <x-slot:caption>
            Mark Attendance List
        </x-slot:caption>

        <x-slot:th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Check If Present</th>
        </x-slot:th>
        @foreach($students as $user)
            <tr>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <div class="status status--{{$user->status == 1 ? 'active' : 'pending'}}">{{$user->status == 1 ? 'Verified' : 'pending'}}</div>
                </td>
                <td >
                       <label for="present">
                           <input type="checkbox" name="present[]" id="present" value='{{ $user->id }}'>
                           Present
                        </label>
                                 
                </td>
            </tr>
        @endforeach

    </x-table>
    <button class="btn-primary">
        Save Changes
    </button>
</form>
</x-app-layout>
