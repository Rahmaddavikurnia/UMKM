<?php

use App\Http\Controllers\LocationController;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provinces', function () {
    $provinces = Province::all();
    return response()->json(['data' => $provinces]);
});

Route::get('/regencies/{province_id}', function ($province_id) {
    $regencies = Regency::where('province_id', $province_id)->get();
    return response()->json(['data' => $regencies]);
});

