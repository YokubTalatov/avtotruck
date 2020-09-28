<?php

namespace App\Http\Controllers;

use App\Company;
use App\Order;
use App\Status;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::All();
        return view("order.order", compact("orders"));
    }

    public function order()
    {
        $user = DB::table("users")->where("name", auth()->user()->name)->first()->name;
        dd($user);
        $order = DB::table('orders')->where("name", $user)->first()->id;
        dd($order);
        $order_id = User::where("order_id", $order)->get();
        return view('order.order', compact("order_id", $order_id));
    }

    public function create()
    {
        $users = User::all();
        $status_ids = Status::all();
        return view("order.create", [
            'users' => $users,
            'status_ids' => $status_ids
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255'
        ]);

        $order = new Order();

        $order->user_id = $request->input('users');
        $order->source = $request->input("source");
        $order->from = $request->input("from");
        $order->from_location = $request->input('from_location');
        $order->to = $request->input('to');
        $order->to_location = $request->input('to_location');
        $order->pickup_time = $request->input('pickup_time');
        $order->commodity = $request->input('commodity');
        $order->weight = $request->input('weight');
        $order->drive_price = $request->input('drive_price');
        $order->load_number = $request->input('load_number');
        $order->status_id = $request->input('status_id');
        $order->bol_image = $request->input('bol_image');

        $order->save();
        return redirect()->route("orders")->with("success");
    }

    public function edit($id)
    {

        $order = Order::findOrFail($id);
        $users = User::all();
        $status_ids = Status::all();
        return view("order.edit", compact(["users", "order", "status_ids"]));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->name = $request->input('ordername');
        $order->user_id = $request->input('users');
        $order->source = $request->input("source");
        $order->from = $request->input("from");
        $order->from_location = $request->input('from_location');
        $order->to = $request->input('to');
        $order->to_location = $request->input('to_location');
        $order->pickup_time = $request->input('pickup_time');
        $order->commodity = $request->input('commodity');
        $order->weight = $request->input('weight');
        $order->drive_price = $request->input('drive_price');
        $order->load_number = $request->input('load_number');
        $order->status_id = $request->input('status_id');
        $order->bol_image = $request->input('bol_image');

        $order->save();
        return redirect()->route("orders")->with("order");
    }

    public function delete($id)
    {
        Order::destroy($id);

        return redirect()->route("orders");
    }
}
