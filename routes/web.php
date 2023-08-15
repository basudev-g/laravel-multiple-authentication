<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\ConfirmPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Auth Routes

Route::get('admin/home', [AdminController::class, 'index'])->name('admi.home');
Route::get('admin', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin', [LoginController::class, 'login']);
Route::get('admin/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('admin.password.confirm');
Route::post('admin/password/confirm', [ConfirmPasswordController::class, 'confirm']);
Route::post('admin/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
Route::get('admin/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
Route::post('admin/password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
Route::get('admin/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

