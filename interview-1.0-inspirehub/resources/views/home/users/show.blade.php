<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            Profile
        </x-slot:h2>
        <x-slot:button>
            Edit
        </x-slot:button>
    </x-main-sub-heading>

    Name : <b> {{ $data->firstname}} {{ $data->lastname}} </b>
    Designation :<b> {{ $data->designation }} </b>

</x-app-layout>
