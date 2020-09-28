<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];
    public function path()
    {
        return route('order.show', $this);
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, "status_id");
    }
}
