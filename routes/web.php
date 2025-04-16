<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PemakaianController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:petugas'])->group(function () {
  
    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');
});

//tarif routes
Route::resource('tarif', TarifController::class);

//pelanggan routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pelanggan', PelangganController::class);
});

//petugas routes
Route::resource('petugas', PetugasController::class);

//pemakaian routes
Route::get('/admin/pemakaian', [PemakaianController::class, 'index'])->name('admin.pemakaian.index');
Route::get('/admin/pemakaian/create', [PemakaianController::class, 'create'])->name('admin.pemakaian.create');
Route::post('/admin/pemakaian/store', [PemakaianController::class, 'store'])->name('admin.pemakaian.store');
Route::get('/admin/pemakaian/edit/{id}', [PemakaianController::class, 'edit'])->name('admin.pemakaian.edit');
Route::post('/admin/pemakaian/update/{id}', [PemakaianController::class, 'update'])->name('admin.pemakaian.update');
Route::get('/admin/pemakaian/delete/{id}', [PemakaianController::class, 'destroy'])->name('admin.pemakaian.delete');