<form method="{{ $method }}" action="{{ $action }}" class="form">
       <!-- Validation Errors -->
       <x-auth-validation-errors class="error-card" :errors="$errors" />

    @csrf
    {{ $slot }} 
    <x-button>Save Changes</x-button>   
</form>