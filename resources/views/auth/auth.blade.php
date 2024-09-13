<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <x-authentication-card-logo/>

    <h1 class="text-black mt-1.5 font-bold text-[26px]">به جمع ما بپیوند!</h1>

    <form method="POST" action="{{ route('auth') }}" class="w-full">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <x-button-auth>
            {{ __('Log in') }}
        </x-button-auth>
    </form>

</x-guest-layout>
