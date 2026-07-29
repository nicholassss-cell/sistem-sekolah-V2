<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\SchoolClass\StoreController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Manajemen Siswa
Route::name('students.')->prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');

    // Halaman Detail Siswa
    Route::get('/{id}', function ($id) {
        Route::get('/{id}', [StudentController::class, 'show'])->name('show');
    });

    // Halaman Tambah Siswa
    Route::get('/create', function () {
         Route::get('/create', [StudentController::class, 'create'])->name('create');
    });

    // Halaman Edit Siswa
    Route::get('/{id}/edit', function (string $id) {
       Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    });

    // Logika Tambah Siswa
    Route::post('/', function () {
        Route::post('/', [StudentController::class, 'store'])->name('store');
    });

    // Logika Edit Siswa
    Route::put('/{id}', function (string $id) {
        Route::put('/{id}', [StudentController::class, 'update'])->name('update');
    });

    // Logika Hapus Siswa
    Route::delete('/{id}', function (string $id) {
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
    });

});