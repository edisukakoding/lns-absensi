<?php

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\OrganizationalStructureController;
use App\Http\Controllers\Admin\WardController;
use App\Http\Controllers\Admin\WorkHourController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('/position', PositionController::class)->except(['show']);
    Route::resource('/employee', EmployeeController::class);
    Route::resource('organizationalstructure', OrganizationalStructureController::class)->except(['show']);
    Route::get('/population', [WardController::class, 'population'])->name('population.index');
    Route::get('/population/{population}/edit', [WardController::class, 'population_edit'])->name('population.edit');
    Route::get('/population/create', [WardController::class, 'population_create'])->name('population.create');
    Route::post('/population', [WardController::class, 'population_store'])->name('population.store');
    Route::put('/population/{population}', [WardController::class, 'population_update'])->name('population.update');
    Route::delete('/population/{population}', [WardController::class, 'population_destroy'])->name('population.destoy');
    Route::get('/population/api', [WardController::class, 'population_api'])->name('population.api');
    
    Route::prefix('setting')->group(function () {
        Route::resource('/workhours', WorkHourController::class)->except(['show']);
        Route::get('company', [CompanyController::class, 'index'])->name('company.index');
    });
});
