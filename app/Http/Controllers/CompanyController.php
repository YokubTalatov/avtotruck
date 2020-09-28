<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {

        $companies = Company::All();
        return view("company.company", compact("companies"));
    }

    public function create()
    {
        return view("company.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255'
        ]);

        $company = new Company();

        $company->name = $request->input('name');
        $company->save();
        return redirect()->route("companies")->with("success");
    }

    public function edit($id)
    {

        $company = Company::findOrFail($id);
        return view("company.edit", compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->name = $request->input('name');
        $company->save();
        return redirect()->route("companies")->with("company");
    }

    public function delete($id)
    {
        Company::destroy($id);

        return redirect()->route("companies");
    }
}
