<?php

namespace App\Http\Controllers;


use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class DriverController extends Controller
{


    public function index()
    {

        $drivers = Driver::with('user')
            ->latest()
            ->get();


        return view(
            'driver.index',
            compact('drivers')
        );

    }





    public function create()
    {

        return view('driver.create');

    }





    public function store(Request $request)
    {


        $request->validate([

            'name'=>'required',

            'email'=>'required|email|unique:users',

            'license_number'=>'required',

            'phone'=>'required'

        ]);





        // Create driver login account

        $user = User::create([

            'name'=>$request->name,

            'email'=>$request->email,

            'password'=>Hash::make('12345678'),

            'role'=>'driver'

        ]);







        // Create driver profile

        Driver::create([

            'user_id'=>$user->id,

            'name'=>$request->name,

            'license_number'=>$request->license_number,

            'phone'=>$request->phone,

            'availability'=>'available'

        ]);






        return redirect()

            ->route('driver.index')

            ->with(
                'success',
                'Driver created successfully. Default password: 12345678'
            );


    }







    public function destroy(Driver $driver)
    {


        if($driver->user)

        {

            $driver->user->delete();

        }



        $driver->delete();



        return redirect()

            ->route('driver.index');


    }



}
