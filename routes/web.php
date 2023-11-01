<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\PetugasController;
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
    // return view('welcome');
// });

Route::get('/', [AuthUserController::class, 'index'])->name('login');
Route::post('/login', [AuthUserController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthUserController::class, 'logoutUser'])->name('admin.logout');
    Route::prefix('admin')->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/new-petugas', [AdminController::class, 'petugasBaru'])->name('admin.new-petugas');
        Route::get('/delete-petugas/{id}', [AdminController::class, 'petugasHapus'])->name('admin.delete-petugas');
        Route::post('/new-type', [AdminController::class, 'typeBaru'])->name('admin.new-type');
        Route::get('/delete-type/{id}', [AdminController::class, 'typeHapus'])->name('admin.delete-type');
        Route::post('/log-all-delete', [AdminController::class, 'logHapus'])->name('admin.delete-all-log');
        Route::post('/parkir-all-delete', [AdminController::class, 'parkirHapus'])->name('admin.delete-all-parkir');
    });
    Route::prefix('petugas_masuk')->group(function () {
        Route::get('/parkir-masuk', [PetugasController::class, 'masuk'])->name('parkir.masuk');
        Route::post('/parkir-masuk', [PetugasController::class, 'masukNew'])->name('parkir.masuk-new');
    });
    Route::prefix('petugas_keluar')->group(function () {
        Route::get('/parkir-keluar', [PetugasController::class, 'keluar'])->name('parkir.keluar');
        Route::post('/parkir-keluar', [PetugasController::class, 'keluarDetail'])->name('parkir.keluar-detail');
        Route::put('/parkir-keluar', [PetugasController::class, 'keluarDetailSubmit'])->name('parkir.keluar-detail-submit');
    });
});
