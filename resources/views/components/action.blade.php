<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Action
    </button>
    <ul class="dropdown-menu p-2">
        <li>
            <form action="" method="post" onclick="return confirm('از کار خود مطمئن هستید؟')">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger w-100 rounded-3">
                    حذف
                </button>
            </form>
        </li>
        <li class="mt-1">
            <form action="" method="get">
                <button type="submit" class="btn btn-success w-100 rounded-3">
                    Edit
                </button>
            </form>
        </li>
    </ul>
</div>
