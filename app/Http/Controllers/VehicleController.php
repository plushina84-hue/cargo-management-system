<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    public function index()
    {
        $vehicles = Vehicle::all();

        return view('vehicle.index', compact('vehicles'));
    }


    public function create()
    {
        return view('vehicle.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'plate_number'=>'required',
            'type'=>'required',
            'capacity'=>'required'
        ]);


        Vehicle::create([

            'plate_number'=>$request->plate_number,

            'type'=>$request->type,

            'capacity'=>$request->capacity,

            'status'=>'available'

        ]);


        return redirect()
        ->route('vehicle.index');

    }



    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
        ->route('vehicle.index');
    }

}
