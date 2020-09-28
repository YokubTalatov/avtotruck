<?php

namespace App\Http\Controllers;

use App\Company;
use App\Driver;
use App\Driver_type;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::All();
        return view("driver.driver", compact("drivers"));
    }

    public function create()
    {
        $driver_types = Driver_type::all();
        $company_ids = Company::all();
        return view("driver.create", [
            'driver_types' => $driver_types,
            'company_ids' => $company_ids
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255'
        ]);

        $driver = new Driver();
        $driver->company_id = $request->input("company_id");
        $driver->driver_type_id = $request->input("drivertypes");
        $driver->name = $request->input('drivername');

        $driver->save();
        return redirect()->route("drivers")->with("success");
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        $driver_types = Driver_type::all();
        $company_ids = Company::all();
        return view("driver.edit", compact(["driver_types", "driver", "company_ids"]));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $driver->name = $request->input('drivername');
        $driver->driver_type_id = $request->input("drivertypes");
        $driver->company_id = $request->input("company_id");
        $driver->save();
        return redirect()->route("drivers")->with("driver");
    }

    public function delete($id)
    {
        Driver::destroy($id);

        return redirect()->route("drivers");
    }
}
