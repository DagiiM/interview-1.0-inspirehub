<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            Create Attendance List
        </x-slot:h2>
        <x-slot:button>
            <a href="{{ route('darasas.attendances.index',$data) }}" class="app-link">View All Attendance lists</a>
        </x-slot:button>
    </x-main-sub-heading>
    <x-form>
        <x-slot:method>POST</x-slot:method>
        <x-slot:action>{{ route('darasas.attendances.store',$data) }}</x-slot:action>
        <x-input>
            <x-slot:name>Name of the Attendance</x-slot:name>
            <x-slot:placeholder>Enter Attendance Name</x-slot:placeholder>
            <x-slot:id>name</x-slot:id>
            <x-slot:value>{{ old('name') }}</x-slot:value>
        </x-input>
        <x-input>
            <x-slot:name>Description of the Attendance</x-slot:name>
            <x-slot:placeholder>Enter Attendance Description</x-slot:placeholder>
            <x-slot:id>description</x-slot:id>
            <x-slot:value>{{ old('description') }}</x-slot:value>
        </x-input>
    
    </x-form>

</x-app-layout>