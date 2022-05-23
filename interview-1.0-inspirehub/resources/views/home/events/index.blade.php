<x-app-layout>
    <x-table>
        <x-slot:caption>
            All Events
        </x-slot:caption>

        <x-slot:th>
            <th>Event Name</th>
            <th>Event Description</th>
            <th>Date of the Event</th>
            <th>Actions</th>
        </x-slot:th>
        @foreach($data as $event)
            <tr>
                <td>{{$event->name}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->date}}</td>
                <td>
                    <x-action>
                        <x-slot:viewLink>{{route('events.show',$event)}}</x-slot:viewLink>
                        <x-slot:editLink>{{route('events.edit',$event)}}</x-slot:editLink>
                        <x-slot:deleteLink>{{route('events.destroy',$event)}}</x-slot:deleteLink>
                    </x-action>

                </td>
            </tr>
        @endforeach


    </x-table>
</x-app-layout>
