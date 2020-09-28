<?php

namespace App\Http\Controllers;

use App\Company;
use App\Status;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::All();
        return view("status.status", compact("statuses"));
    }

    public function create()
    {
        $company_ids = Company::all();
        return view("status.create", [
            'company_ids' => $company_ids
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255'
        ]);

        $statuses = new Status();

        $statuses->name = $request->input('name');
        $statuses->company_id = $request->input("company_id");
        $statuses->save();
        return redirect()->route("statuses")->with("success");
    }

    public function edit($id)
    {

        $statuses = Status::findOrFail($id);
        $company_ids = Company::all();
        return view("status.edit", compact([ "statuses", "company_ids"]));
    }

    public function update(Request $request, $id)
    {
        $statuses = Status::findOrFail($id);

        $statuses->name = $request->input('statusname');
        $statuses->company_id = $request->input("company_id");

        $statuses->save();
        return redirect()->route("statuses")->with("status");
    }

    public function delete($id)
    {
        Status::destroy($id);

        return redirect()->route("statuses");
    }
}
