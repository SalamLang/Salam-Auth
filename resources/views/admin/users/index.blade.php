@extends("admin.layouts.master")
@section("title", "Users")

@section("content")
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">کد ها</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th>ایدی</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>نقش</th>
                                    <th>ایجاد شده در</th>
                                    <th>اپدیت شده در</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="@if($user["email"] === user()["email"]) bg-success-subtle @endif">
                                        <td>{{ $user["id"] }}</td>
                                        <td>{{ $user["name"] }}</td>
                                        <td>{{ $user["email"] }}</td>
                                        <td>@if($user["role_id"] === 1) ادمین @else کاربر @endif</td>
                                        <td>{{ $user["created_at"] }}</td>
                                        <td>{{ $user["updated_at"] }}</td>
                                        <td class="text-end">
                                        <span class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">عملیات</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <form action="/admin/users/delete/{{ $user["id"] }}" onclick="return confirm('ایا مطمئنید؟')">
                                                    <button type="submit" class="dropdown-item">حذف</button>
                                                </form>
                                                <a class="dropdown-item" href="/admin/users/edit/{{ $user["id"] }}">ادیت</a>
                                            </div>
                                        </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

@endsection