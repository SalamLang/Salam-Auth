@extends("admin.layouts.master")
@section("title", "Salam Admin")

@section("content")
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">کاربران</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th>ایدی</th>
                                    <th>شناسه</th>
                                    <th>ایدی کاربر</th>
                                    <th>کد</th>
                                    <th>عنوان</th>
                                    <th>ایجاد شده در</th>
                                    <th>اپدیت شده در</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($codes as $code)
                                    <tr class="@if($code["user_id"] === user()["id"]) bg-success-subtle @endif">
                                        <td>{{ $code["id"] }}</td>
                                        <td>{{ $code["slug"] }}</td>
                                        <td>{{ $code["user_id"] }}</td>
                                        <td>{{ substr($code["code"], 0, 25) }}</td>
                                        <td>{{ substr($code["title"], 0, 25) }}</td>
                                        <td>{{ $code["created_at"] }}</td>
                                        <td>{{ $code["updated_at"] }}</td>
                                        <td class="text-end">
                                            <a href="/admin/codes/show/{{ $code['id'] }}"
                                               class="btn btn-warning rounded-3">نمایش</a>
                                            <a href="https://editor.salamlang.ir/?code={{ $code['slug'] }}"
                                               class="btn btn-warning rounded-3">بازدید در سایت</a>
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