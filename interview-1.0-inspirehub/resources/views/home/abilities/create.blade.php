<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            Create Ability/Permission
        </x-slot:h2>
        <x-slot:button>
            <a href="{{ route('abilities.index') }}" class="app-link">View All Abilities/Permissions</a>
        </x-slot:button>
    </x-main-sub-heading>

    <x-form>
        <x-slot:method>POST</x-slot:method>
        <x-slot:action>{{ route('abilities.store') }}</x-slot:action>
        <x-input>
            <x-slot:name>Name of the Ability/Permission</x-slot:name>
            <x-slot:placeholder>Enter Permission Name</x-slot:placeholder>
            <x-slot:id>name</x-slot:id>
            <x-slot:value>{{ old('name') }}</x-slot:value>
        </x-input>
        <x-input>
            <x-slot:name>Description of the Ability/Permission</x-slot:name>
            <x-slot:placeholder>Enter Permission Description</x-slot:placeholder>
            <x-slot:id>description</x-slot:id>
            <x-slot:value>{{ old('description') }}</x-slot:value>
        </x-input>
    </x-form>

</x-app-layout>
