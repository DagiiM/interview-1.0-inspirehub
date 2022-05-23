<x-app-layout>
    <x-main-sub-heading>
        <x-slot:h2>
            All Emails
        </x-slot:h2>
        <x-slot:button>
            <a href="{{ route('emails.create') }}" class="app-link">Send Bulk Emails</a>
        </x-slot:button>
    </x-main-sub-heading>

</x-app-layout>
