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

Route::get('/', function () {
    return view('landing-page/homepage');
});

Route::get('/profile', function () {
    return view('/landing-page/profile');
});

Route::get('/contact', function () {
    return view('/landing-page/contact');
});

Route::get('/structur-organization', [LandingPageController::class, 'structurOrganization']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('admin');

    Route::resource('/attendance', AttendaceController::class)->only(['index', 'store'])->middleware('isSetWorkHour');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
