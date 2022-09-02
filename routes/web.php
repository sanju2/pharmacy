<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pharmacy', [App\Http\Controllers\PharmacyController::class, 'index'])->name('pharmacy.index');

Route::get('/pharmacy/create', [App\Http\Controllers\PharmacyController::class, 'create'])->name('pharmacy.create');

Route::post('/pharmacy/store', [App\Http\Controllers\PharmacyController::class, 'store'])->name('pharmacy.store');

Route::get('/pharmacy/{id}/edit', [App\Http\Controllers\PharmacyController::class, 'edit'])->name('pharmacy.edit');

Route::put('/pharmacy/{id}/update', [App\Http\Controllers\PharmacyController::class, 'update'])->name('pharmacy.update');