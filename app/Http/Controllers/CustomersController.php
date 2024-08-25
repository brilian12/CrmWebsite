<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::latest()->get();
        $data = [
            'customers' => $customers,
        ];

        return view("/backend/widget", $data);
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $customers = Customers::where('name', 'like', '%' . request('search') . '%')->paginate(5);
        } else {
            $customers = Customers::paginate(5);
        }

        return view("/backend/widget", ['customers' => $customers]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:20',
            'email' => 'string|required|email|unique:users|max:255',
            'no_hp' => 'string|required|max:12',
            'password' => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customers = Customers::create([
            'name'     => $request->name,
            'email'   => $request->email,
            'no_hp'     => $request->no_hp,
            'password'   => bcrypt($request->password),
        ]);


        if ($customers) {
            return redirect('/backend/widget')->with('message', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('/backend/insertcustomer')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Request $request)
    {

        $data = [
            "customers" => Customers::where("id", $request->id)->first()
        ];

        return view('/backend/customers/update', $data);
    }

    public function detail(Request $request)
    {

        $data = [
            "customers" => Customers::where("id", $request->id)->first()
        ];

        return view('/backend/customers/detail', $data);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required'
        ]);

        Customers::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
        ]);

        return redirect('/backend/widget')->with('message', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Customers::where("id", $id)->delete();
        return redirect('/backend/widget')->with('message', 'Data Berhasil Dihapus');
    }
}