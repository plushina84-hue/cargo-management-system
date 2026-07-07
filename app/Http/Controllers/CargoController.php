<?php

namespace App\Http\Controllers;


use App\Models\Cargo;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Notifications\CargoAssignedNotification;
use Illuminate\Http\Request;



class CargoController extends Controller
{


    public function index()
    {

        $cargos = Cargo::with([
            'driver',
            'vehicle'
        ])
        ->latest()
        ->get();



        return view(
            'cargo.index',
            compact('cargos')
        );

    }







    public function create()
    {


        $drivers = Driver::where(
            'availability',
            'available'
        )->get();



        $vehicles = Vehicle::where(
            'status',
            'available'
        )->get();




        return view(
            'cargo.create',
            compact(
                'drivers',
                'vehicles'
            )
        );


    }







    public function store(Request $request)
    {


        $request->validate([


            'tracking_number'
            =>'required|unique:cargos',


            'origin'
            =>'required',


            'destination'
            =>'required',


            'driver_id'
            =>'required',


            'vehicle_id'
            =>'required'


        ]);





        $cargo = Cargo::create([


            'tracking_number'
            =>$request->tracking_number,


            'origin'
            =>$request->origin,


            'destination'
            =>$request->destination,


            'driver_id'
            =>$request->driver_id,


            'vehicle_id'
            =>$request->vehicle_id,


            'status'
            =>'pending'


        ]);






        return redirect()

            ->route('cargo.index')

            ->with(
                'success',
                'Cargo created successfully'
            );


    }









    public function update(Request $request, Cargo $cargo)
    {


        $request->validate([


            'driver_id'
            =>'required',


            'vehicle_id'
            =>'required',


            'status'
            =>'required'


        ]);






        $cargo->update([


            'driver_id'
            =>$request->driver_id,


            'vehicle_id'
            =>$request->vehicle_id,


            'status'
            =>$request->status


        ]);






        $driver = Driver::find(
            $request->driver_id
        );





        if(
            $driver &&
            $driver->user
        )
        {


            $driver->user->notify(

                new CargoAssignedNotification($cargo)

            );


        }






        return redirect()

            ->route('cargo.index')

            ->with(
                'success',
                'Cargo updated successfully'
            );


    }









    public function updateStatus(Request $request, Cargo $cargo)
    {


        $request->validate([


            'status'
            =>'required'


        ]);






        $cargo->update([


            'status'
            =>$request->status


        ]);







        return redirect()

            ->route('cargo.index');



    }









    public function driverStatus(Request $request, Cargo $cargo)
    {


        $request->validate([


            'status'
            =>'required'


        ]);






        $cargo->update([


            'status'
            =>$request->status


        ]);






        return redirect()

            ->route('dashboard')

            ->with(
                'success',
                'Cargo status updated'
            );


    }









    public function destroy(Cargo $cargo)
    {


        $cargo->delete();




        return redirect()

            ->route('cargo.index')

            ->with(
                'success',
                'Cargo deleted'
            );


    }






}
