@extends("admin.layouts.master")

@section("title", "users")

@section("content")
<div class="container mt-4">
    <div class="w-100 bg-white p-3 rounded-3 shadow">
        <form action="{{ route("users.store") }}" method="post" class="w-full h-full">
            @csrf
            <div class="mt-0 d-flex justify-content-center align-items-center w-100">
                <h1 class="my-0">create new user</h1>
            </div>
            <div class="mt-3">
                <label for="name" class="d-block text-[17px]">name :</label>
                <input type="text" name="name" id="name" class="form-control mt-1" required>
                @error('name')
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="email" class="d-block text-[17px]">email :</label>
                <input type="email" name="email" id="email" class="form-control mt-1" required>
                @error('email')
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="password" class="d-block text-[17px]">password :</label>
                <input type="password" name="password" id="password" class="form-control mt-1" required>
                @error('password')
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="password-confirm" class="d-block text-[17px]">password confirm :</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control mt-1" required>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">create</button>
            </div>
        </form>
    </div>
</div>
@endsection
