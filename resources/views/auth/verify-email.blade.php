<x-guest-layout>
    <div class="mb-4 text-gray-600 dark:text-gray-400 text-[15px] text-center">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if(session('status'))
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-[15px] text-center text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @else
            <div class="mb-4 font-medium text-[15px] text-center text-red-600 dark:text-red-400">
                {{ __('در ارسال ایمیل مشکلی پیش امده است. احتمالا به حد اکثر ارسال ایمیل رسیده اید.') }}
            </div>
        @endif
    @endif
    <form method="POST" action="{{ route('verification.send') }}" class="w-full">
        @csrf

        <div>
            <x-button-auth>
                {{ __('Resend Verification Email') }}
            </x-button-auth>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit"
                class="mt-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('Log Out') }}
        </button>
    </form>
</x-guest-layout>
