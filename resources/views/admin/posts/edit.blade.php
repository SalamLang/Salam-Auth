@extends("admin.layouts.master")

@section("title", "users")

@section("content")
<div class="container mt-4" xmlns="http://www.w3.org/1999/html">
    <div class="w-100 bg-white p-3 rounded-3 shadow">
        <form action="{{ route("posts.update",$post?->id) }}" method="post" class="w-full h-full">
            @csrf
            @method("PUT")
            <div class="mt-0 flex justify-center items-center">
                <h1 class="text-center">edit post {{$post->id}}</h1>
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">title :</label>
                <input type="text" name="title" id="title"
                       class="form-control mt-1"
                       required value="{{$post?->title}}">
                @error("title")
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="description" class="d-block text-[17px]">description :</label>
                <textarea name="description" id="description" cols="30" rows="6"
                          class="form-control mt-1"
                          required>{{ $post?->description }}</textarea>
                @error('description')
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="thumbnail" class="d-block text-[17px]">thumbnail :</label>
                <input type="text" name="thumbnail" id="thumbnail"
                       class="form-control mt-1"
                       required value="{{$post?->thumbnail}}">
                @error('thumbnail')
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="user_id" class="d-block text-[17px]">
                    user :
                </label>
                <select name="user_id" id="user_id" class="form-control mt-1">
                    <option value="{{$post?->user_id}}">{{ $post->user()?->first()?->name }}</option>
                </select>
                @error('user_id')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <label for="category_id" class="d-block text-[17px]">
                    category :
                </label>
                <select name="category_id" id="category_id" class="form-control mt-1">
                    <option value="{{$post?->category_id}}">{{ $post?->category()?->first()?->title }}</option>
                </select>
                @error('category_id')
                <span class="invalid-feedback text-red-500 d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
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
        $('#user_id').select2({
            multiple: false,
            ajax: {
                url: '{{ route("get-users") }}',
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
                                text: item.name
                            };
                        })
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });
        $('#category_id').select2({
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
