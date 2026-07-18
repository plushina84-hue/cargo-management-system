<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('cargo', CargoController::class);
        Route::resource('driver', DriverController::class);
        Route::resource('vehicle', VehicleController::class);
    });

    Route::patch('/cargo/{cargo}/driver-status', [CargoController::class, 'driverStatus'])
        ->middleware('role:driver')
        ->name('cargo.driver-status');

    Route::get('/tracking', [TrackingController::class, 'index'])
        ->name('tracking');

    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
