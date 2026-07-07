<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cargo;



class TrackingController extends Controller
{


    public function index(Request $request)
    {


        $cargo = null;



        if($request->filled('code'))
        {


            $cargo = Cargo::where(
                'tracking_number',
                $request->code
            )->first();



        }



        return view('tracking.index', compact('cargo'));



    }



}
