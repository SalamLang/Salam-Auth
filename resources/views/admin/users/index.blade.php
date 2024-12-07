<x-app-layout admin="true">
    <div class="container pt-5">
        <div class="card !overflow-hidden !rounded-xl">
            <div class="card-header">لیست کد ها</div>
            <div class="card-body" dir="ltr">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @section("style")
        @vite(["resources/sass/app.scss"])
    @endsection

    @section("script")
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endsection
</x-app-layout>
