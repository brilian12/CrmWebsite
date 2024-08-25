<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Packet;
use App\Models\Trans;
use Illuminate\Http\Request;

class TransController extends Controller
{
    public function index()
    {
        $trans = Trans::latest()->get();
        $data = [
            'trans' => $trans,
        ];

        return view("/backend/trans", $data);
    }

    public function insert()
    {
        $cust = Customers::latest()->get();
        $pack = Packet::latest()->get();
        $data = [
            'cust' => $cust,
            'pack' => $pack,
        ];

        return view("/backend/transaction/insert", $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'id_cust' => 'required',
            'id_pack' => 'required',
            'qty'     => 'required|numeric|min:1',
        ]);

        $packet = Packet::findOrFail($request->id_pack);

        $total = $packet->price * $request->qty;

        $trans = Trans::create([
            'id_cust' => $request->id_cust,
            'id_pack' => $request->id_pack,
            'qty'     => $request->qty,
            'total'   => $total,
        ]);

        if ($trans) {
            return redirect('/backend/transaction')->with('message', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('/backend/inserttransaction')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function delete($id)
    {
        Trans::where("id", $id)->delete();
        return redirect('/backend/transaction')->with('message', 'Data Berhasil Dihapus');
    }
}
