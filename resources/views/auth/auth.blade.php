<x-guest-layout>
    <x-authentication-card>
        <x-authentication-card-logo/>

        <x-validation-errors class="my-4 w-full"/>

        <h1 class="text-black mt-1.5 font-bold text-[26px]">به جمع ما بپیوند!</h1>

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession
        <form method="POST" action="{{ route('auth') }}" class="w-full">
            @csrf
            <div>
                <x-label for="email" value="{{ __('Email') }}"/>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus autocomplete="username"/>
            </div>
            @if (Route::has('password.request'))
                <div class="input-box w-full mt-4 mb-2">
                    <a href="{{ route('password.request') }}"
                       class="forgot-password text-[#276EF6] font-bold hover:underline">{{ __('Forgot your password?') }}</a>
                </div>
            @endif

            <div class="input-box w-full">
                <x-button-auth>
                    {{ __('مرحله بعد') }}
                </x-button-auth>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
