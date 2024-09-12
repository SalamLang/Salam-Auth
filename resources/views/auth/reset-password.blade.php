<x-guest-layout>
    <x-authentication-card>
        <x-authentication-card-logo />

        <x-validation-errors class="my-4 w-full" />

        @if(end($errors) === [])
            <h1 class="text-black mt-1.5 font-bold text-[26px]">رمزت جدید انتخاب کن</h1>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="w-full">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button-auth>
                    {{ __('بازیابی رمز عبور') }}
                </x-button-auth>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
