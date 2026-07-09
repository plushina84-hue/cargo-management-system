<?php

namespace App\Http\Controllers;


use App\Models\Cargo;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Http\Request;



class DashboardController extends Controller
{


    public function index()
    {


        $user = auth()->user();



        if($user->role == 'admin')
        {


            $totalCargo = Cargo::count();


            $pendingCargo = Cargo::where(
                'status',
                'pending'
            )->count();



            $deliveredCargo = Cargo::where(
                'status',
                'delivered'
            )->count();



            $totalDrivers = Driver::count();



            $totalVehicles = Vehicle::count();




            $recentCargo = Cargo::with([
                'driver',
                'vehicle'
            ])
            ->latest()
            ->take(5)
            ->get();





            return view(
                'dashboard.admin',
                compact(

                    'totalCargo',

                    'pendingCargo',

                    'deliveredCargo',

                    'totalDrivers',

                    'totalVehicles',

                    'recentCargo'

                )
            );



        }




        if($user->role == 'driver')
        {


            $driver = $user->driver;



            $cargos = Cargo::where(

                'driver_id',

                $driver->id

            )
            ->latest()
            ->get();



            return view(
                'dashboard.driver',
                compact('cargos')
            );


        }





        return view('dashboard.user');


    }


}
