@extends("admin.layouts.master")

@section("title", "users")

@section("content")
    <div class="container mt-4 mb-5" xmlns="http://www.w3.org/1999/html">
        <div class="w-100 bg-white p-3 rounded-3 shadow">
            <div class="mt-0 flex justify-center items-center">
                <h1 class="text-center">show comment {{ $comment->id }}</h1>
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">user name :</label>
                <input type="text" name="title" id="title"
                       class="form-control"
                       required disabled value="{{ $comment->user_name }}" >
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">avatar :</label>
                <input type="text" name="title" id="title"
                       class="form-control"
                       required disabled value="{{ $comment->avatar }}" >
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">content :</label>
                <textarea name="description" id="description" cols="30" rows="6"
                          class="form-control"
                          required disabled>{{ $comment->content }}</textarea>
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">parent comment :</label>
                <input type="text" name="title" id="title"
                       class="form-control"
                       required disabled value="{{ $comment->parent_id }}" >
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">file :</label>
                <input type="text" name="title" id="title"
                       class="form-control"
                       required disabled value="{{ $comment->post_id }}" >
            </div>
            <div class="mt-3">
                <label for="created_at" class="d-block text-[17px]">
                    created at :
                </label>
                <input type="text" name="created_at" id="created_at"
                       class="form-control"
                       required disabled value="{{ $comment->created_at }}">
            </div>
            <div class="mt-3">
                <label for="updated_at" class="d-block text-[17px]">
                    updated at :
                </label>
                <input type="text" name="updated_at" id="updated_at"
                       class="form-control"
                       required disabled value="{{ $comment->updated_at }}">
            </div>
        </div>
    </div>
@endsection
