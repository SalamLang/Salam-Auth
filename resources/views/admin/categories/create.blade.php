@extends("admin.layouts.master")

@section("title", "users")

@section("content")
<div class="container mt-4">
    <div class="w-100 bg-white p-3 rounded-3 shadow">
        <form action="{{ route("categories.store") }}" method="post" class="w-full h-full">
            @csrf
            <div class="mt-0 flex justify-center items-center">
                <h1 class="text-center">create new category</h1>
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">title :</label>
                <input type="text" name="title" id="title"
                       class="form-control mt-1"
                       required>
                @error("title")
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="parent_id" class="d-block text-[17px]">
                    parent category :
                </label>
                <select name="parent_id" id="parent_id" class="form-control mt-1"></select>
                @error('parent_id')
                <span class="invalid-feedback  text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit"
                        class="btn btn-primary">
                    create
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
@section("scripts")
    <script src="{{asset("assets/select2/jquery.min.js")}}"></script>
    <script src="{{asset("assets/select2/select2.js")}}"></script>
    <script>
        $('#parent_id').select2({
            multiple: false,
            ajax: {
                url: '{{ route("get-categories") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.title
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });
    </script>
@endsection
