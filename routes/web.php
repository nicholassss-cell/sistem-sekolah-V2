<?php

use App\Http\Controller\StudentController;
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
        return "Menampilkan detail siswa dengan ID = {$id}";
    })->name('show');

    // Halaman Tambah Siswa
    Route::get('/create', function () {
        return "Ini adalah halaman tambah siswa ";
    })->name('create');

    // Halaman Edit Siswa
    Route::get('/students/{id}/edit', function (string $id) {
        return "Ini adalah halaman edit siswa dengan ID: {$id}";
    })->name('edit');

    // Logika Tambah Siswa
    Route::post('/students', function () {
        return "Menambah data siswa baru";
    })->name('store');

    // Logika Edit Siswa
    Route::put('/students/{id}', function (string $id) {
        return "Mengubah data siswa dengan ID: {$id}";
    })->name('update');

    // Logika Hapus Siswa
    Route::delete('/students/{id}', function (string $id) {
        return "menghapus data siswa dengan ID: {$id}";
    })->name('destroy');

});