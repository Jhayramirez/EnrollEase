<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

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
// Landing Page
Route::get('/', function () {
    return view('index');
})->name('home');
// Enrollment Routes (both for user and admins)
Route::get('/enrollment-form', [EnrollmentController::class, 'showEnrollmentForm'])->name('enrollmentform');
Route::post('/enrollment-form', [EnrollmentController::class, 'store'])->name('enrollment.store');
// Admin Dashboard for records
Route::get('/app', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('send-mail', [MailController::class, 'index']);
