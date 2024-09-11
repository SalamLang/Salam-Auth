@extends("admin.layouts.master")
@section("title", "Salam Admin")

@section("content")
    <div class="page_wrapper">
        <div class="page-body">
            <div class="container-xl px-8">
                <div class="w-100 h-100 rounded-4 shadow bg-white p-4">
                    <h1 class="text-center">ویرایش</h1>
                    <form action="/admin/users/update" method="post">
                        <input type="hidden" name="id" value="{{ $user["id"] }}">
                        <div class="input-box mt-2">
                            <label for="name" class="fs-3 my-2">نام:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="حسین گیاهی" min="3" required value="{{ $user["name"] }}">
                        </div>
                        <div class="input-box mt-2">
                            <label for="email" class="fs-3 my-2">ایمیل:</label>
                            <input type="email" class="form-control" id="email" name="email" dir="ltr" placeholder="exampla@example.com" required value="{{ $user['email'] }}">
                        </div>
                        <div class="input-box mt-2">
                            <label for="role_id" class="fs-3 my-2">نقش:</label>
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="" selected>...</option>
                                <option value="1">admin</option>
                                <option value="2">user</option>
                            </select>
                        </div>
                        <div class="input-box mt-2">
                            <button type="submit" class="btn rounded-3 mt-2 btn-primary text-white">ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

@endsection