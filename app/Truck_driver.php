<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck_driver extends Model
{
    public function trucks()
    {
        return $this->belongsTo('App\Truck', "truck_id");
    }
    public function drivers()
    {
        return $this->belongsTo('App\Driver', "driver_id");
    }
}
