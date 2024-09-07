@extends("admin.layouts.master")

@section("title", "users")

@section("content")
<div class="container mt-4" xmlns="http://www.w3.org/1999/html">
    <div class="w-100 bg-white p-3 rounded-3 shadow">
        <form action="{{ route("users.update",$user->id) }}" method="post" class="w-full h-full">
            @csrf
            @method("PUT")
            <div class="mt-0 flex justify-center items-center">
                <h1 class="text-center">edit user {{ $user->id }}</h1>
            </div>
            <div class="mt-3">
                <label for="name" class="block text-[17px]">name :</label>
                <input type="text" name="name" id="name" class="form-control mt-1" required value="{{ $user->name }}">
                @error('name')
                <span class="invalid-feedback text-red-500 block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="email" class="block text-[17px]">email :</label>
                <input type="email" name="email" id="email" class="form-control mt-1" required value="{{ $user->email }}">
                @error('email')
                <span class="invalid-feedback text-red-500 block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="password" class="block text-[17px]">new password :</label>
                <input type="password" name="password" id="password" class="form-control mt-1">
                @error('password')
                <span class="invalid-feedback text-red-500 block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">edit</button>
            </div>
        </form>
    </div>
</div>
@endsection
