<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\SesiController;
use App\Http\Controllers\BisnisController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SyncLocationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['guest'])->group(function(){
    Route::get('/login',[SesiController::class,'index']);
    Route::post('/login',[SesiController::class,'login'])->name('login');
});

Route::middleware(['auth'])->group(function(){
    Route::post('/  ',[SesiController::class,'logout'])->name('logout');
});

Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');

Route::controller(CategoriController::class)->group(function(){
    Route::get('/admin/categori/dashboard', [CategoriController::   class,'index'])->name('c.tabel');
    Route::get('/admin/categori/input', [CategoriController::class,'create'])->name('c.create');
    Route::post('/admin/categori/input', [CategoriController::class,'store'])->name('c.store');
    Route::get('/admin/categori/update/{categoris}',[CategoriController::class,'edit'])->name('c.edit');
    Route::patch('/admin/categori/update/{categoris}',[CategoriController::class,'update'])->name('c.update');
    Route::delete('/admin/categori/delete/{categoris}',[CategoriController::class,'destroy'])->name('c.delete');
});

Route::get('/provinces', [LocationController::class, 'getProvinces']);
Route::get('/regencies/{province_id}', [LocationController::class, 'getRegencies']);

Route::get('/sync/provinces', [SyncLocationController::class, 'syncProvinces']);
Route::get('/sync/regencies', [SyncLocationController::class, 'syncRegencies']);


Route::controller(BisnisController::class)->group(function(){
    Route::get('/admin/umkm/dashboard','index')->name('b.tabel');
    Route::get('/admin/umkm/input', 'create')->name('b.create');
    Route::post('/admin/umkm/input', [BisnisController::class,'store'])->name('b.store');
    Route::get('/admin/umkm/update/{categoris}',[BisnisController::class,'edit'])->name('b.edit');
    Route::patch('/admin/umkm/update/{categoris}',[BisnisController::class,'update'])->name('b.update');
    Route::delete('/admin/umkm/delete/{categoris}',[BisnisController::class,'destroy'])->name('b.delete');
});

Route::get('/',[HomeController::class,'homeutama'])->name('homeutama');