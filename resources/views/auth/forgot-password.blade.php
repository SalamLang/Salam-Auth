<x-guest-layout>
    <x-authentication-card>
        <x-authentication-card-logo />

        @if(end($errors) === [])
            <h1 class="text-black mt-1.5 font-bold text-[26px]">رمزت یادت رفته؟</h1>
            <div class="my-2 text-[15px] text-center text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
        @endif

        @session('status')
            <div class="mb-4 font-medium text text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="my-4 w-full" />

        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button-auth>
                    {{ __('Email Password Reset Link') }}
                </x-button-auth>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
