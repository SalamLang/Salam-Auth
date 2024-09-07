@extends("admin.layouts.master")

@section("title","posts")

@section("content")
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">Manage Posts</div>
            <div class="card-body">
                <div class="row mb-3 d-flex justify-content-between align-items-center">
                    <div class="col-5 d-flex justify-content-center align-items-center">
                        <select id="filter-column" class="form-control w-100">
                            <option value="">Select Column</option>
                            <option value="id">Id</option>
                            <option value="title">Title</option>
                            <option value="description">Description</option>
                            <option value="thumbnail">Thumbnail</option>
                            <option value="user_id">User Id</option>
                            <option value="category_id">Category Id</option>
                            <option value="created_at">Created At</option>
                            <option value="updated_at">Updated At</option>
                        </select>
                    </div>
                    <div class="col-5 d-flex justify-content-center align-items-center">
                        <input type="text" id="filter-value" class="form-control w-100" placeholder="Enter Filter Value">
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-center btn-width">
                        <button id="filter-button" class="btn btn-primary btn-width">Filter</button>
                    </div>
                </div>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            $('#filter-button').click(function() {
                var column = $('#filter-column').val();
                var value = $('#filter-value').val();
                var table = $('#posts-table').DataTable();

                if(column && value) {
                    // Clear previous filters
                    table.search('').columns().search('');

                    // Set new filter
                    table.column(`${column}:name`).search(value).draw();
                } else {
                    // If no column or value, clear all filters
                    table.search('').columns().search('').draw();
                }
            });
        });
    </script>
@endsection
