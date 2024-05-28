<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimoniController;

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
})->name('home');

Route::get('/portfolio', [KontenController::class, 'user_konten'])->name('portfolio');
Route::get('/detail-portfolio/{id}', [KontenController::class, 'user_konten_detail'])->name('portfolio.detail');

Route::get('/artikel', [ArtikelController::class, 'user_artikel'])->name('user.artikel');
Route::get('/detail-artikel/{id}', [ArtikelController::class, 'user_artikel_detail'])->name('user.artikel.detail');

Route::get('/tentang-kami', function () {
    return view('user/tampil/tentang-kami');
})->name('tentang-kami');

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')->middleware('auth');
    
    Route::get('/admin', function () {
        return view('admin/layouts/admin');
    })->name('layouts/admin');
    
    Route::get('/dataadmin', function () {
        return view('admin/dataadmin');
    })->name('dataadmin');
    
    Route::get('/tambahdataadmin', function () {
        return view('admin/tambahdataadmin');
    })->name('tambahdataadmin');
    
    Route::get('/editadmin', function () {
        return view('admin/editadmin');
    })->name('editadmin');
    
    //Data Konten
    Route::get('/datakonten', [KontenController::class, 'index'])->name('datakonten');

    Route::get('/tambahkonten', [KontenController::class, 'create'])->name('tambahkonten');
    Route::post('/tambahkonten', [KontenController::class, 'store']);

    Route::get('/editkonten/{id}', [KontenController::class, 'edit'])->name('editkonten');
    Route::put('/editkonten/{id}', [KontenController::class, 'update'])->name('updatekonten');

    Route::delete('/deletekonten/{id}', [KontenController::class, 'destroy'])->name('deletekonten');

    //Data Artikel
    Route::get('/dataartikel', [ArtikelController::class, 'index'])->name('dataartikel');

    Route::get('/tambahartikel', [ArtikelController::class, 'create'])->name('tambahartikel');
    Route::post('/tambahartikel', [ArtikelController::class, 'store']);

    Route::get('/editartikel/{id}', [ArtikelController::class, 'edit'])->name('editartikel');
    Route::put('/editartikel/{id}', [ArtikelController::class, 'update'])->name('updateartikel');

    Route::delete('/deleteartikel/{id}', [ArtikelController::class, 'destroy'])->name('deleteartikel');

    //Data Testimoni
    Route::get('/datatestimoni', [TestimoniController::class, 'index'])->name('datatestimoni');

    Route::get('/tambahtestimoni', [TestimoniController::class, 'create'])->name('tambahtestimoni');
    Route::post('/tambahtestimoni', [TestimoniController::class, 'store']);

    Route::get('/edittestimoni/{id}', [TestimoniController::class, 'edit'])->name('edittestimoni');
    Route::put('/edittestimoni/{id}', [TestimoniController::class, 'update'])->name('updatetestimoni');

    Route::delete('/deletetestimoni/{id}', [TestimoniController::class, 'destroy'])->name('deletetestimoni');
});