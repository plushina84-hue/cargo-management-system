<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{

    protected $fillable = [

        'user_id',
        'cargo_id',
        'action',
        'description'

    ];



    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
