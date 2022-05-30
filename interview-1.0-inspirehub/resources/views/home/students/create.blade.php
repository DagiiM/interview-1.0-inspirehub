<x-app-layout>

<x-main-sub-heading>
    <x-slot:h2>
        Let's Create a Student
    </x-slot:h2>
    <x-slot:button>
        <a class="app-link" href="{{ route('students.index') }}">View All Students</a>
    </x-slot:button>
</x-main-sub-heading>

<x-form>
    <x-slot:method>POST</x-slot:method>
    <x-slot:action>{{ route('students.store') }}</x-slot:action>
    <x-input>
        <x-slot:name>Student Firstname</x-slot:name>
        <x-slot:placeholder>Enter Student Firstname</x-slot:placeholder>
        <x-slot:id>firstname</x-slot:id>
        <x-slot:value>{{ old('firstname') }}</x-slot:value>
    </x-input>

    <x-input>
        <x-slot:name>Student Lastname</x-slot:name>
        <x-slot:placeholder>Enter Student Lastname</x-slot:placeholder>
        <x-slot:id>lastname</x-slot:id>
        <x-slot:value>{{ old('lastname') }}</x-slot:value>
    </x-input>

    <x-input>
        <x-slot:name>Student Email</x-slot:name>
        <x-slot:type>email</x-slot:type>
        <x-slot:placeholder>Enter Student Email</x-slot:placeholder>
        <x-slot:id>email</x-slot:id>
        <x-slot:value>{{ old('email') }}</x-slot:value>
    </x-input>

    <x-input maxLength="20">
        <x-slot:name>Student Registration Number</x-slot:name>
        <x-slot:type>number</x-slot:type>
        <x-slot:placeholder>Enter Student Registration Number</x-slot:placeholder>
        <x-slot:id>registration_number</x-slot:id>
        <x-slot:value>{{ old('registration_number') }}</x-slot:value>
    </x-input>

    <div class="text-field">
        <label for="darasa">Select Class to Add Student To</label>
        <select name="darasa" id="darasa">
            @foreach ($darasa as $class)
                 <option value="{{ $class }}">{{ $class }}</option>
            @endforeach
        </select>
    </div>

</x-form>
<script>
    const url = "";
</script>
</x-app-layout>
