<x-guest-layout>
    <x-authentication-card>
        <x-authentication-card-logo/>

        <x-validation-errors class="my-4 w-full"/>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession
        <form method="POST" action="{{ route('login') }}" class="w-full">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus autocomplete="username"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}"/>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                         autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember"/>
                    <span class="forgot-password text-[#276EF6] font-bold hover:underline mr-2">{{ __('Remember me') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
                <div class="input-box w-full mt-4 mb-2">
                    <a href="{{ route('password.request') }}"
                       class="forgot-password text-[#276EF6] font-bold hover:underline">{{ __('Forgot your password?') }}</a>
                </div>
            @endif

            <div class="input-box w-full">
                <x-button-auth>
                    {{ __('Log in') }}
                </x-button-auth>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
