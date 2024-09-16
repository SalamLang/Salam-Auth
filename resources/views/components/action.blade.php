<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        عملیات
    </button>
    <ul class="dropdown-menu p-2">
        <li>
            <form action="{{ route("user.codes.destroy", $model->id) }}" method="post" onclick="return confirm('از کار خود مطمئن هستید؟')">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger w-100 rounded-3">
                    حذف
                </button>
            </form>
        </li>
        <li>
            <a href="{{ route("editor", $model->uuid) }}" class="btn btn-success w-100 rounded-3 mt-1">مشاهده</a>
        </li>
    </ul>
</div>
