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
    Route::prefix('admin')->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/logout', [AuthUserController::class, 'logoutUser'])->name('admin.logout');
        Route::post('/new-petugas', [AdminController::class, 'petugasBaru'])->name('admin.new-petugas');
        Route::post('/new-type', [AdminController::class, 'typeBaru'])->name('admin.new-type');
    });
    Route::get('/parkir-masuk', [PetugasController::class, 'masuk'])->name('parkir.masuk');
    Route::post('/parkir-masuk', [PetugasController::class, 'masukNew'])->name('parkir.masuk-new');
    Route::get('/parkir-keluar', [PetugasController::class, 'keluar'])->name('parkir.keluar');
    Route::post('/parkir-keluar', [PetugasController::class, 'keluarDetail'])->name('parkir.keluar-detail');
    Route::put('/parkir-keluar', [PetugasController::class, 'keluarDetailSubmit'])->name('parkir.keluar-detail-submit');
});
