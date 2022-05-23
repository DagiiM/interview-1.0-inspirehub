<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="form" style="margin:1%">
            @csrf

            <!-- Email Address -->
            <x-input>
                <x-slot:name>Email</x-slot:name>
                <x-slot:placeholder>Enter Email</x-slot:placeholder>
                <x-slot:id>email</x-slot:id>
                <x-slot:autocomplete>on</x-slot:autocomplete>
                <x-slot:value>{{ old('email') }}</x-slot:value>
            </x-input>

            <!-- Password -->
          
            <x-input>
                <x-slot:name>Password</x-slot:name>
                <x-slot:placeholder>Enter Password</x-slot:placeholder>
                <x-slot:id>password</x-slot:id>
                <x-slot:autocomplete>current-password</x-slot:autocomplete>
                <x-slot:value>{{ old('password') }}</x-slot:value>
            </x-input>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

    </x-auth-card>
</x-guest-layout>
