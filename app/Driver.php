<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function companies()
    {
        return $this->belongsTo('App\Company', "company_id");
    }
    public function drivertypes()
    {
        return $this->belongsTo('App\Driver_type', "driver_type_id");
    }
}
