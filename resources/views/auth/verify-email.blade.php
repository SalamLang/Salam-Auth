<x-guest-layout>
    <div class="mb-4 text-gray-600 dark:text-gray-400 text-[15px] text-center">
        {{ __('ممنون که ثبت‌نام کردید! قبل از شروع، لطفاً ایمیل خود را با کلیک بر روی لینکی که برای شما ارسال کرده‌ایم تأیید کنید. اگر ایمیل را دریافت نکردید، با کمال میل ایمیل دیگری برای شما ارسال خواهیم کرد.') }}
    </div>

    @if(session('status'))
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-[15px] text-center text-green-600 dark:text-green-400">
                {{ __('یک لینک تأیید جدید به آدرس ایمیلی که هنگام ثبت‌نام ارائه داده‌اید ارسال شد.') }}
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
                {{ __('ارسال مجدد') }}
            </x-button-auth>
        </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit"
                class="mt-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('خروج') }}
        </button>
    </form>
</x-guest-layout>
