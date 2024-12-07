<x-app-layout admin="true">
    <div class="py-10">
        <div class="max-w-10xl mx-auto px-10 md:px-36 lg:px-96">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="w-full">
                @csrf
                @method('PUT')
                <div class="mt-2">
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <div class="mt-2">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"  value="{{ $user->email }}"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="mt-2">
                    <x-input-label for="role_id" :value="__('Email')"/>
                    <select name="role_id" id="role_id" class="border-2 border-transparent transition-all duration-300 w-full mt-1.5 h-[50px] rounded-[15px] !outline-0 p-3 placeholder-gray-300 px-[35px]">
                        <option value="1" @if($user->role_id == 1) selected @endif>{{ __("admin") }}</option>
                        <option value="2" @if($user->role_id == 2) selected @endif>{{ __("user") }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('role_id')" class="mt-2"/>
                </div>

                <div class="mt-2">
                    <x-input-label for="password" :value="__('Password')"/>
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <x-button-auth class="mt-3 w-[100px] h-[45px]">
                    {{ __('ویرایش') }}
                </x-button-auth>
            </form>
        </div>
    </div>
</x-app-layout>
