<?php

use App\Http\Controllers\AttendaceController;
use App\Http\Controllers\LandingPageController;
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

Route::get('/', [LandingPageController::class, 'homepage']);
Route::get('/profile', [LandingPageController::class, 'profile']);
Route::get('/contact', [LandingPageController::class, 'contact']);
Route::get('/organizationalstructure', [LandingPageController::class, 'organizationalstructure']);
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('admin');

    Route::resource('/attendance', AttendaceController::class)->only(['index', 'store'])->middleware('isSetWorkHour');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
