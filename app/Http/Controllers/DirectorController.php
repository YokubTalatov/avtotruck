<?php

namespace App\Http\Controllers;

use App\Order;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class DirectorController extends Controller
{
    public function order()
    {
        $user = DB::table("users")->where("name", auth()->user()->name)->first()->name;
        dd($user);
        $order = DB::table('orders')->where("name", $user)->first()->id;
        dd($order);
        $order_id = User::where("order_id", $order)->get();
        return view('order.order', compact("order_id", $order_id));
    }
}
