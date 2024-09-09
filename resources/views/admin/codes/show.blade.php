@extends("admin.layouts.master")
@section("title", "Salam Admin")

@section("content")
    <div class="page_wrapper">
        <div class="page-body">
            <div class="container-xl px-8">
                <div class="w-100 h-100 rounded-4 shadow bg-white p-4">
                    <h1 class="text-center">نمایش</h1>
                    <div class="input-box mt-2">
                        <label for="name" class="fs-3 my-2">ایدی:</label>
                        <input type="text" class="form-control" value="{{ $code["id"] }}" readonly>
                    </div>
                    <div class="input-box mt-2">
                        <label for="name" class="fs-3 my-2">ایدی کاربر:</label>
                        <input type="text" class="form-control" value="{{ $code["user_id"] }}" readonly>
                    </div>
                    <div class="input-box mt-2">
                        <label for="name" class="fs-3 my-2">عنوان:</label>
                        <input type="text" class="form-control" value="{{ $code["title"] }}" readonly>
                    </div>
                    <div class="input-box mt-2">
                        <label for="name" class="fs-3 my-2">عنوان:</label>
                        <input type="text" class="form-control" value="{{ $code["title"] }}" readonly>
                    </div>
                    <div class="input-box mt-2">
                        <label for="name" class="fs-3 my-2">کد:</label>
                        <textarea type="text" class="form-control" readonly>{{ $code["code"] }}</textarea>
                    </div>
                    <div class="input-box mt-2">
                        <label for="name" class="fs-3 my-2">ایجاد شده در:</label>
                        <textarea type="text" class="form-control" readonly>{{ $code["created_at"] }}</textarea>
                    </div>
                    <div class="input-box mt-2">
                        <label for="name" class="fs-3 my-2">اپدیت شده در:</label>
                        <textarea type="text" class="form-control" readonly>{{ $code["updated_at"] }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

@endsection