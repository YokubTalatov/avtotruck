<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Truck;
use App\Truck_driver;
use Illuminate\Http\Request;

class TruckDriverController extends Controller
{
        public function index()
        {
            $truck_drivers = Truck_driver::All();
            return view("truckdriver.truckdriver", compact("truck_drivers"));
        }

        public function create()
        {
            $drivers = Driver::all();
            $truck_ids = Truck::all();
            return view("truckdriver.create", [
                'drivers' => $drivers,
                'truck_ids' => $truck_ids
            ]);
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'max:255'
            ]);

            $truck_driver = new Truck_driver();

            $truck_driver->driver_id = $request->input("drivers");
            $truck_driver->truck_id = $request->input("truck_id");
            $truck_driver->date = $request->input('date');

            $truck_driver->save();
            return redirect()->route("truckdrivers")->with("success");
        }

        public function edit($id)
        {

            $truckdriver = Truck_driver::findOrFail($id);
            $drivers = Driver::all();
            $truck_ids = Truck::all();
            return view("truckdriver.edit", compact(["roles", "user", "truck_ids"]));
        }

        public function update(Request $request, $id)
        {
            $truck_driver = Truck_driver::findOrFail($id);

            $drivers->driver_id = $request->input("drivers");
            $truck_ids->truck_id = $request->input("truck_id");
            $truck_driver->date = $request->input('date');

            $truck_driver->save();
            return redirect()->route("truck_drivers")->with("truck_driver");
        }

        public function delete($id)
        {
            Truck_driver::destroy($id);

            return redirect()->route("truck_drivers");
        }
}
