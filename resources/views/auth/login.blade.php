<x-guest-layout>
    <x-authentication-card>
        <x-authentication-card-logo/>

        <x-validation-errors class="my-4 w-full"/>

        @if(end($errors) === [])
            <h1 class="text-black mt-1.5 font-bold text-[26px]">خوش اومدی</h1>
            <p class="text-[14px] text-gray-400 text-center mt-1">اینجور که معلومه دفعه اولت نسیت! برای وارد شدن
                اطلاعاتت رو
                کامل کن</p>
        @endif
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

            <div class="flex items-center justify-between my-5">
                <div class="block">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember"/>
                        <span class="ms-2 text-[#276EF6] font-bold cursor-pointer">{{ __('Remember me') }}</span>
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="forgot-password text-[#276EF6] font-bold hover:underline">{{ __('Forgot your password?') }}</a>
                @endif
            </div>

            <x-button-auth>
                {{ __('Log in') }}
            </x-button-auth>
        </form>
    </x-authentication-card>
</x-guest-layout>
