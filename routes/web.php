<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ShowProfileController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserColumnController;

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

// Login Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Dashboard Route
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

// Profile Route
Route::middleware('auth')->group(function () {
    Route::get('profile', [ShowProfileController::class, 'show'])->name('profile');
    Route::post('profile/update', [ShowProfileController::class, 'update'])->name('profile.update');
});

// Show Leads Route
Route::get('/leads', [LeadController::class, 'showAllLeads'])->name('leads.all');

// Create Lead Route
Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');

// Save new Lead Route
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

// Create custom columns in user view leads
Route::get('/user-columns/create', [UserColumnController::class, 'create'])->name('user-columns.create');
Route::get('/user-columns', [UserColumnController::class, 'index']);
Route::get('/user-columns/{userColumn}/edit', [UserColumnController::class, 'edit'])->name('user-columns.edit');
Route::delete('/user-columns/{userColumn}', [UserColumnController::class, 'destroy'])->name('user-columns.destroy');

Route::post('/user-columns', [UserColumnController::class, 'store'])->name('user-columns.store');
Route::put('/user-columns/{userColumn}', [UserColumnController::class, 'update'])->name('user-columns.update');