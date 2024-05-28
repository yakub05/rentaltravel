<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\ArtikelController;

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
    return view('user/tampil/home');
})->name('user/tampil/home');

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard')->middleware('auth');;

    Route::get('/admin', function () {
        return view('admin/layouts/admin');
    })->name('layouts/admin');

    Route::get('/dataadmin', [UserController::class, 'index']);
    Route::get('tambahdataadmin', [UserController::class, 'create'])->name('tambahdataadmin');
    Route::post('tambahdataadmin', [UserController::class, 'store']);
    Route::get('/editadmin/{id}', [UserController::class, 'edit'])->name('editadmin');
    Route::put('/editadmin/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('deleteadmin/{id}', [UserController::class, 'destroy'])->name('deleteadmin');

    Route::get('/tambahdataadmin', function () {
        return view('admin/tambahdataadmin');
    })->name('tambahdataadmin');

    Route::get('/editadmin', function () {
        return view('admin/editadmin');
    })->name('editadmin');

    //Data Rental Travel
    Route::get('/datarentaltravel', [TravelController::class, 'index']);

    Route::get('/tambahrental', [TravelController::class, 'create'])->name('tambahrental');
    Route::post('/tambahrental', [TravelController::class, 'store']);

    Route::get('/editrental', function () {
        return view('admin/editrental');
    })->name('editrental');
    Route::delete('deletetravel/{id}', [TravelController::class, 'destroy'])->name('deletetravel');

    //Data Konten
    Route::get('/datakonten', [KontenController::class, 'index'])->name('datakonten');

    Route::get('/tambahkonten', [KontenController::class, 'create'])->name('tambahkonten');
    Route::post('/tambahkonten', [KontenController::class, 'store']);

    Route::get('/editkonten/{id}', [KontenController::class, 'edit'])->name('editkonten');
    Route::put('/editkonten/{id}', [KontenController::class, 'update'])->name('update');

    Route::delete('/deletekonten/{id}', [KontenController::class, 'destroy'])->name('deletekonten');

    //Data Artikel
    Route::get('/dataartikel', [ArtikelController::class, 'index'])->name('dataartikel');

    Route::get('/tambahartikel', [ArtikelController::class, 'create'])->name('tambahartikel');
    Route::post('/tambahartikel', [ArtikelController::class, 'store']);

    Route::get('/editartikel/{id}', [ArtikelController::class, 'edit'])->name('editartikel');
    Route::put('/editartikel/{id}', [ArtikelController::class, 'update'])->name('update');

    Route::delete('/deleteartikel/{id}', [ArtikelController::class, 'destroy'])->name('deleteartikel');
});
