<?php

namespace App\Http\Controllers;

use App\Models\Packet;
use Illuminate\Http\Request;

class PacketController extends Controller
{
    public function index()
    {
        $packet = Packet::latest()->get();
        $data = [
            'packet' => $packet,
        ];
        
        return view("/backend/packet", $data);
    }
}
