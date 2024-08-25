<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PacketController;
use App\Http\Controllers\TransController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('adminregis/', function () {
    return view('register');
});

Route::post("register/", [AuthController::class, "create"]);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('backend')->group(function () {
    Route::get('/', function () {
        return view('login');
    });

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    });

    Route::get('/widget', function () {
        return view('backend.widget');
    });

    Route::get('/packet', function () {
        return view('backend.packet');
    });

    Route::get('/transaction', function () {
        return view('backend.trans');
    });

    //Customer
    Route::get('/insertcustomer', function () {
        return view('backend.customers.insert');
    });


    //Packet
    //Transaction
    // Route::get('/inserttransaction', function () {
    //     return view('backend.transaction.insert');
    // });

    // Route::get('/detailcustomer', function () {
    //     return view('backend.customers.detail');
    // });

    // Route::get('/updatecustomer/{id}', function () {
    //     return view('backend.customers.update');
    // });

    //Customer
    Route::get("/detailcust/{id}", [CustomersController::class, "detail"]);
    Route::get('/widget', [CustomersController::class, "index"]);
    Route::post("/addcust", [CustomersController::class, "create"]);
    Route::get("deletecust/{id}", [CustomersController::class, "delete"]);
    Route::get("/updatecustomer/{id}", [CustomersController::class, "edit"]);
    Route::post("/updatecust", [CustomersController::class, "update"]);
    Route::get('/custsearch', [CustomersController::class, "search"]);

    //Packet
    Route::get('/packet', [PacketController::class, "index"]);

    //Transactions
    Route::get('/transaction', [TransController::class, "index"]);
    Route::get('/inserttransaction', [TransController::class, "insert"]);
    Route::post("/addtrans", [TransController::class, "create"]);
    Route::get("deletetrans/{id}", [TransController::class, "delete"]);

    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', '_login')->name('_login');
    });
});
