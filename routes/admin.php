<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\StructurOrganizationController;
use App\Http\Controllers\Admin\WorkHourController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/position', PositionController::class)->except(['show']);
    Route::resource('/employee', EmployeeController::class);
    Route::resource('structurorganization', StructurOrganizationController::class)->except(['show']);

    Route::prefix('setting')->group(function () {
        Route::resource('/workhours', WorkHourController::class)->except(['show']);
    });
});
