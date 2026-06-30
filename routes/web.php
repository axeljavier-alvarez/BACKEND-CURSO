<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
// 
Route::prefix('admin')->middleware('admin')->group(function(){
Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');


});