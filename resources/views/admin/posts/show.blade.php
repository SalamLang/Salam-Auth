@extends("admin.layouts.master")

@section("title", "users")

@section("content")
    <div class="container mt-4 mb-5" xmlns="http://www.w3.org/1999/html">
        <div class="w-100 bg-white p-3 rounded-3 shadow">
            <div class="mt-0 flex justify-center items-center">
                <h1 class="text-center">show file {{ $post?->id }}</h1>
            </div>
            <div class="mt-3">
                <label for="title" class="d-block text-[17px]">title :</label>
                <input type="text" name="title" id="title"
                       class="form-control mt-1"
                       required disabled value="{{ $post?->title }}">
            </div>
            <div class="mt-3">
                <label for="slug" class="d-block text-[17px]">slug :</label>
                <input type="text" name="slug" id="slug"
                       class="form-control mt-1"
                       required disabled value="{{ $post?->slug }}">
            </div>
            <div class="mt-3">
                <label for="description" class="d-block text-[17px]">description :</label>
                <textarea name="description" id="description" cols="30" rows="6"
                          class="form-control mt-1"
                          required disabled>{{ $post?->description }}</textarea>
            </div>
            <div class="mt-3">
                <label for="img_address" class="d-block text-[17px]">thumbnail :</label>
                <input type="text" name="img_address" id="img_address"
                       class="form-control mt-1"
                       required disabled value="{{ $post?->thumbnail }}">
            </div>
            <div class="mt-3">
                <label for="user_id" class="d-block text-[17px]">
                    user :
                </label>
                <input type="text" name="user_id" id="user_id"
                       class="form-control mt-1"
                       required disabled value="{{ $post?->user()?->first()?->name }}">
            </div>
            <div class="mt-3">
                <label for="category_id" class="d-block text-[17px]">
                    category :
                </label>
                <input type="text" name="category_id" id="category_id"
                       class="form-control mt-1"
                       required disabled value="{{ $post?->category()?->first()?->title }}">
            </div>
{{--            <div class="mt-3">--}}
{{--                <label for="likes" class="d-block text-[17px]">--}}
{{--                    لایک ها:--}}
{{--                </label>--}}
{{--                <input type="text" name="likes" id="likes"--}}
{{--                       class="form-control mt-1"--}}
{{--                       required disabled value="{{$post->likes}}">--}}
{{--            </div>--}}
{{--            <div class="mt-3">--}}
{{--                <label for="views" class="d-block text-[17px]">--}}
{{--                    بازدید ها :--}}
{{--                </label>--}}
{{--                <input type="text" name="views" id="views"--}}
{{--                       class="form-control mt-1"--}}
{{--                       required disabled value="{{$post->views + $post->visits->count()}}">--}}
{{--            </div>--}}
            <div class="mt-3">
                <label for="created_at" class="d-block text-[17px]">
                    created at :
                </label>
                <input type="text" name="created_at" id="created_at"
                       class="form-control mt-1"
                       required disabled value="{{ $post?->created_at }}">
            </div>
            <div class="mt-3">
                <label for="updated_at" class="d-block text-[17px]">
                    updated at :
                </label>
                <input type="text" name="updated_at" id="updated_at"
                       class="form-control mt-1"
                       required disabled value="{{ $post?->updated_at }}">
            </div>
        </div>
    </div>
@endsection
