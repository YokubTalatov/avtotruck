<?php

namespace App\Http\Controllers;

use App\Company;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
        return view("user.user", compact("users"));
    }

    public function create()
    {
        $roles = Role::all();
        $company_ids = Company::all();
        return view("user.create", [
            'roles' => $roles,
            'company_ids' => $company_ids
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:255'
        ]);

        $user = new User();

        $user->name = $request->input('username');
        $user->role_id = $request->input("roles");
        $user->company_id = $request->input("company_id");
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('paswword'));
        $user->telegram_user_id = "@" . $request->input('telegramuserid');

        $user->save();
        return redirect()->route("users")->with("success");
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();
        $company_ids = Company::all();
        return view("user.edit", compact(["roles", "user", "company_ids"]));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('username');
        $user->role_id = $request->input("roles");
        $user->company_id = $request->input("company_id");
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('paswword'));
        $user->telegram_user_id = $request->input('telegramuserid');

        $user->save();
        return redirect()->route("users")->with("user");
    }

    public function delete($id)
    {
        User::destroy($id);

        return redirect()->route("users");
    }

}
