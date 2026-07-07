<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



Route::get('/', function () {

    return view('welcome');

});





Route::middleware(['auth'])->group(function () {



    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */


    Route::get('/dashboard', 
    [DashboardController::class,'index']
    )->name('dashboard');





    /*
    |--------------------------------------------------------------------------
    | Cargo
    |--------------------------------------------------------------------------
    */


    Route::resource('cargo', CargoController::class);





    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    */


    Route::resource('driver', DriverController::class);






    /*
    |--------------------------------------------------------------------------
    | Vehicle
    |--------------------------------------------------------------------------
    */


    Route::resource('vehicle', VehicleController::class);






    /*
    |--------------------------------------------------------------------------
    | Tracking
    |--------------------------------------------------------------------------
    */


    Route::get('/tracking',
    [TrackingController::class,'index']
    )->name('tracking');







    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    */


    Route::get('/notifications',
    [NotificationController::class,'index']
    )->name('notifications');







    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */


    Route::get('/profile',
    [ProfileController::class,'edit']
    )->name('profile.edit');



    Route::patch('/profile',
    [ProfileController::class,'update']
    )->name('profile.update');



    Route::delete('/profile',
    [ProfileController::class,'destroy']
    )->name('profile.destroy');






});




require __DIR__.'/auth.php';
