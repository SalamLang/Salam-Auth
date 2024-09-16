<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditorRequest;
use App\Models\Code;
use Symfony\Component\Uid\Uuid;

class EditorController extends Controller
{
    public function index($uuid = null)
    {
        if ($uuid !== null) {
            $code = Code::where("uuid", $uuid)->firstOrFail();
            return view('editor', [
                'value' => $code["code"],
            ]);
        }else {
            return view('editor');
        }
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
