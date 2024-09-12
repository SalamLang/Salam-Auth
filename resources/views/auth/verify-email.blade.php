<x-guest-layout>
    <x-authentication-card>
        <x-authentication-card-logo/>

        @if(end($errors) === [])
            <h1 class="text-black mt-1.5 font-bold text-[26px]">تایید ایمیل</h1>
        @endif

        <div class="my-4 text-[15px] text-gray-600 text-center">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-[15px] text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-button-auth type="submit" class="px-3">
                    {{ __('Resend Verification Email') }}
                </x-button-auth>
            </div>
        </form>

        <div class="flex justify-center items-center gap-4 mt-2">
            <a href="{{ route('profile.show') }}"
               class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Edit Profile') }}</a>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit"
                        class="underline text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
