<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;



class Driver extends Model
{


    protected $fillable = [

        'user_id',

        'name',

        'license_number',

        'phone',

        'availability'

    ];





    public function user()
    {

        return $this->belongsTo(User::class);

    }




    public function cargos()
    {

        return $this->hasMany(Cargo::class);

    }


}
