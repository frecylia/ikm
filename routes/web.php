<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IkmDataController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/formulir', [DashboardController::class, 'formulir']);
    Route::get('/daerah', [DashboardController::class, 'daerah']);
    Route::get('/kategori', [DashboardController::class, 'kategori']);
});
Route::get('/ikm-data/create', [IkmDataController::class, 'create'])->name('ikm_data.create');
Route::post('/ikm-data/store', [IkmDataController::class, 'store'])->name('ikm_data.store');
Route::get('/test', [DashboardController::class, 'test']);

Route::prefix('user')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login/auth', [UserController::class, 'loginAuth']);
    Route::post('/logout', [UserController::class,'logout']);
});
Route::get('/ikm-data/detail-data', [IkmDataController::class, 'index'])->name('ikmdata.index');
Route::get('/ikm-data/export', [IkmDataController::class, 'export'])->name('ikmdata.export');
