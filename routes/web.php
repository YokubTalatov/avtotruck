<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});
Route::get('/cards', function () {
    return view('cards');
});

Route::get('/buttons', function () {
    return view('buttons');
});
Route::get('/charts', function () {
    return view('charts');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/blank', function () {
    return view('blank');
});
Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/utilities-animation', function () {
    return view('utilities-animation');
});
Route::get('/utilities-border', function () {
    return view('utilities-border');
});

Route::get('/utilities-color', function () {
    return view('utilities-color');
});

Route::get('/utilities-other', function () {
    return view('utilities-other');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::group(['prefix' => "company"], function () {
    Route::get("/", "CompanyController@index")->name("companies");
    Route::get("company/create", "CompanyController@create")->name("createcompany");
    Route::post("save", "CompanyController@store")->name("companySave");
    Route::get("edit/{id}", "CompanyController@edit")->name("companyEdit");
    Route::put("update/{id}", "CompanyController@update")->name("updatecompany");
    Route::delete("delete/{id}", "CompanyController@delete")->name("deletecompany");
});

Route::group(['prefix' => "user"], function () {
    Route::get("/", "UserController@index")->name("users");
    Route::get("user/create", "UserController@create")->name("createuser");
    Route::post("save", "UserController@store")->name("userSave");
    Route::get("edit/{id}", "UserController@edit")->name("userEdit");
    Route::put("update/{id}", "UserController@update")->name("updateuser");
    Route::delete("delete/{id}", "UserController@delete")->name("deleteuser");
});

Route::group(['prefix' => "truck"], function () {
    Route::get("/", "TruckController@index")->name("trucks");
    Route::get("user/create", "TruckController@create")->name("createtruck");
    Route::post("save", "TruckController@store")->name("truckSave");
    Route::get("edit/{id}", "TruckController@edit")->name("truckEdit");
    Route::put("update/{id}", "TruckController@update")->name("updatetruck");
    Route::delete("delete/{id}", "TruckController@delete")->name("deletetruck");
});
Route::group(['prefix' => "truckdriver"], function () {
    Route::get("/", "TruckDriverController@index")->name("truckdrivers");
    Route::get("user/create", "TruckDriverController@create")->name("createtruckdrivers");
    Route::post("save", "TruckDriverController@store")->name("truckdriversSave");
    Route::get("edit/{id}", "TruckDriverController@edit")->name("truckdriversEdit");
    Route::put("update/{id}", "TruckDriverController@update")->name("updatetruckdrivers");
    Route::delete("delete/{id}", "TruckDriverController@delete")->name("deletetruckdrivers");
});
Route::group(['prefix' => "drivertype"], function () {
    Route::get("/", "DriverTypeController@index")->name("drivertypes");
    Route::get("user/create", "DriverTypeController@create")->name("createdrivertypes");
    Route::post("save", "DriverTypeController@store")->name("drivertypesSave");
    Route::get("edit/{id}", "DriverTypeController@edit")->name("drivertypesEdit");
    Route::put("update/{id}", "DriverTypeController@update")->name("updatedrivertypes");
    Route::delete("delete/{id}", "DriverTypeController@delete")->name("deletedrivertypes");
});
Route::group(['prefix' => "driver"], function () {
    Route::get("/", "DriverController@index")->name("drivers");
    Route::get("user/create", "DriverController@create")->name("createdrivers");
    Route::post("save", "DriverController@store")->name("driversSave");
    Route::get("edit/{id}", "DriverController@edit")->name("driversEdit");
    Route::put("update/{id}", "DriverController@update")->name("updatedrivers");
    Route::delete("delete/{id}", "DriverController@delete")->name("deletedrivers");
});
Route::group(['prefix' => "status"], function () {
    Route::get("/", "StatusController@index")->name("statuses");
    Route::get("user/create", "StatusController@create")->name("createstatuses");
    Route::post("save", "StatusController@store")->name("statusesSave");
    Route::get("edit/{id}", "StatusController@edit")->name("statusesEdit");
    Route::put("update/{id}", "StatusController@update")->name("updatestatuses");
    Route::delete("delete/{id}", "StatusController@delete")->name("deletestatuses");
});
Route::group(['prefix' => "order"], function () {
    Route::get("/", "OrderController@index")->name("orders");
    Route::get("user/create", "OrderController@create")->name("createorders");
    Route::post("save", "OrderController@store")->name("ordersSave");
    Route::get("edit/{id}", "OrderController@edit")->name("ordersEdit");
    Route::put("update/{id}", "OrderController@update")->name("updateorders");
    Route::delete("delete/{id}", "OrderController@delete")->name("deleteorders");
});



