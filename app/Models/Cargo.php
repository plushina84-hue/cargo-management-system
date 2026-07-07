<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;



class Cargo extends Model
{


    protected $fillable = [

        'tracking_number',

        'origin',

        'destination',

        'status',

        'driver_id',

        'vehicle_id',

        'user_id'

    ];





    public function driver()
    {

        return $this->belongsTo(Driver::class);

    }






    public function vehicle()
    {

        return $this->belongsTo(Vehicle::class);

    }





    public function user()
    {

        return $this->belongsTo(User::class);

    }



}
