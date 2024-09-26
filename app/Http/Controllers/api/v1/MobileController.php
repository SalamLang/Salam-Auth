<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function saveMobile(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
        ]);

        if (Mobile::where('mobile', $request->mobile)->first()) {
            return response()->json([
                'message' => 'شماره موبایل وارد شده قبلا ثبت شده است.',
                'data' => [],
            ]);
        }

        Mobile::create([
            'mobile' => $request->mobile,
        ]);

        return response()->json([
            'message' => 'شماره موبایل شما سیو شد منتظر خبر های جدید باشید.',
            'data' => [],
        ]);
    }
}
