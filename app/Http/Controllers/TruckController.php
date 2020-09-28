<?php

namespace App\Http\Controllers;

use App\Company;
use App\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::All();
        return view("truck.truck", compact("trucks"));
    }

    public function create()
    {
        $company_ids = Company::all();
        return view("truck.create", [
            'company_ids' => $company_ids
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255'
        ]);

        $truck = new Truck();

        $truck->name = $request->input('truckname');;
        $truck->company_id = $request->input("company_id");
        $truck->plate_number = $request->input('platenumber');
        $truck->info = $request->input('info');

        $truck->save();
        return redirect()->route("trucks")->with("success");
    }

    public function edit($id)
    {

        $truck = Truck::findOrFail($id);
        $company_ids = Company::all();
        return view("truck.edit", compact(["truck", "company_ids"]));
    }

    public function update(Request $request, $id)
    {
        $truck = Truck::findOrFail($id);

        $truck->name = $request->input('truckname');
        $truck->company_id = $request->input("company_id");
        $truck->plate_number = $request->input('platenumber');
        $truck->info = $request->input('info');

        $truck->save();
        return redirect()->route("trucks")->with("truck");
    }

    public function delete($id)
    {
        Truck::destroy($id);

        return redirect()->route("trucks");
    }
}
