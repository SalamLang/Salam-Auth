<?php

use App\Http\Controllers\api\v1\MobileController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get('visit', [VisitController::class, 'store']);
Route::post('mobile',[MobileController::class,'saveMobile']);