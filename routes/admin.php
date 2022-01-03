<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PositionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){
    Route::resource('/position', PositionController::class)->except(['show']);
    Route::resource('/employee', EmployeeController::class);
});