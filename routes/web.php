<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataManagement;
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

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('send-mail', [MailController::class, 'index']);
    Route::get('/dashboard', [DataManagement::class, 'index'])->name('dashboard');
    Route::get('/approvedRecords', [DataManagement::class, 'showApprovedRecords'])->name('approvedRecords');
    Route::get('/rejectRecords', [DataManagement::class, 'showRejectRecords'])->name('rejectRecords');
    Route::get('/allRecords', [DataManagement::class, 'showAllRecords'])->name('allRecords');
    Route::put('/dashboard/{enrolleeId}/{status}', [DataManagement::class, 'update'])->name('recordsUpdate');
});
