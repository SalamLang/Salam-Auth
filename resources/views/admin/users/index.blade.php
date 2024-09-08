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
                        <div class="card-body border-bottom py-3">
                            جستجو:
                            <div class="ms-2 d-inline-block">
                                <input type="text" class="form-control" aria-label="Search invoice">
                            </div>
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
                                  <tr>
                                    <td>
                                        <input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice">
                                    </td>
                                    <td>
                                        <span class="text-secondary">001401</span>
                                    </td>
                                    <td>
                                        <a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a></td>
                                    <td>
                                        <span class="flag flag-xs flag-country-us me-2"></span>Carlson Limited
                                    </td>
                                    <td>
                                        87956621
                                    </td>
                                    <td>
                                        15 Dec 2017
                                    </td>
                                    <td class="text-end">
                                        <span class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-secondary">Showing <span>1</span> to <span>8</span> of <span>16</span>
                                entries</p>
                            <ul class="pagination m-0 ms-auto">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")

@endsection