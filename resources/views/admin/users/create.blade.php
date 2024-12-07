<x-app-layout admin="true">
    <div class="py-10">
        <div class="max-w-10xl mx-auto px-10 md:px-36 lg:px-96">
            <form method="POST" action="{{ route('admin.users.store') }}" class="w-full">
                @csrf
                <div class="mt-2">
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <div class="mt-2">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="mt-2">
                    <x-input-label for="password" :value="__('Password')"/>
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <x-button-auth class="mt-3 w-[100px] h-[45px]">
                    {{ __('ایجاد') }}
                </x-button-auth>
            </form>
        </div>
    </div>
</x-app-layout>
