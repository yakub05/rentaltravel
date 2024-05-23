<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    
    Route::get('/dataadmin', function () {
        return view('admin/dataadmin');
    })->name('dataadmin');
    
    Route::get('/tambahdataadmin', function () {
        return view('admin/tambahdataadmin');
    })->name('tambahdataadmin');
    
    Route::get('/editadmin', function () {
        return view('admin/editadmin');
    })->name('editadmin');
    
    Route::get('/kelolakonten', function () {
        return view('admin/kelolakonten');
    })->name('kelolakonten');
    
    Route::get('/tambahkonten', function () {
        return view('admin/tambahkonten');
    })->name('tambahkonten');
    
    Route::get('/editkonten', function () {
        return view('admin/editkonten');
    })->name('editkonten');
});