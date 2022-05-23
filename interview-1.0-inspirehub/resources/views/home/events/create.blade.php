<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            Create School Event
        </x-slot:h2>
        <x-slot:button>
            <a href="{{ route('events.index') }}" class="app-link">View All Events</a>
        </x-slot:button>
    </x-main-sub-heading>

    <x-form>
        <x-slot:method>POST</x-slot:method>
        <x-slot:action>{{ route('events.store') }}</x-slot:action>
        <x-input>
            <x-slot:name>Name of the Event</x-slot:name>
            <x-slot:placeholder>Enter Event Name</x-slot:placeholder>
            <x-slot:id>name</x-slot:id>
            <x-slot:value>{{ old('name') }}</x-slot:value>
        </x-input>
        <x-input>
            <x-slot:name>Description of the Event</x-slot:name>
            <x-slot:placeholder>Enter Event Description</x-slot:placeholder>
            <x-slot:id>description</x-slot:id>
            <x-slot:value>{{ old('description') }}</x-slot:value>
        </x-input>
        <x-input>
        <x-slot:name>Date of the Event</x-slot:name>
        <x-slot:placeholder>Enter Event Date</x-slot:placeholder>
        <x-slot:id>date</x-slot:id>
        <x-slot:type>datetime-local</x-slot:type>
        <x-slot:value>{{ old('date') }}</x-slot:value>
    </x-input>
    
    </x-form>

</x-app-layout>
