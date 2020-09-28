<?php

namespace App\Http\Controllers;

use App\Driver_type;
use Illuminate\Http\Request;

class DriverTypeController extends Controller
{
    public function index()
    {
        $driver_types = Driver_type::All();
        return view("drivertype.drivertype", compact("driver_types"));
    }

    public function create()
    {
        return view("drivertype.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255'
        ]);

        $driver_type = new Driver_type();

        $driver_type->name = $request->input('drivertypename');

        $driver_type->save();
        return redirect()->route("drivertypes")->with("success");
    }

    public function edit($id)
    {

        $driver_type = Driver_type::findOrFail($id);
        return view("drivertype.edit", compact("driver_type"));
    }

    public function update(Request $request, $id)
    {
        $driver_type = Driver_type::findOrFail($id);

        $driver_type->name = $request->input('drivertypename');

        $driver_type->save();
        return redirect()->route("drivertypes")->with("drivertype");
    }

    public function delete($id)
    {
        Driver_type::destroy($id);

        return redirect()->route("drivertypes");
    }
}
