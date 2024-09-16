<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditorRequest;
use App\Models\Code;
use Symfony\Component\Uid\Uuid;

class EditorController extends Controller
{
    public function index()
    {
        return view('editor');
    }

    public function save(EditorRequest $editorRequest)
    {
        Code::create([
            'uuid' => Uuid::v4(),
            'title' => $editorRequest->title,
            'code' => $editorRequest->all()['code'],
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }
}
