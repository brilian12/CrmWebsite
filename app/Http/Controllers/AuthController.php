<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function _login(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with(['failed' => 'Sorry Your Email or Password Is Wrong ']);
        } else {
            Auth::guard('web')->login($user, $remember = true);
            return redirect('/backend/dashboard');
        }
    }

    public function logout(Request $request)
    {
        // Logout user dari guard web
        Auth::guard('web')->logout();

        // Hapus session untuk menjaga keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman login atau halaman lain yang diinginkan
        return redirect('/backend/login')->with('success', 'You have been logged out successfully');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:20',
            'email' => 'string|required|email|unique:users|max:255',
            // 'alamat' => 'string|required|max:100',
            // 'no_hp' => 'string|required|max:12',
            'password' => [
                'required',
                'min:8',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%@]).*$/',
                'confirmed'
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customers = User::create([
            'name'     => $request->name,
            'email'   => $request->email,
            // 'no_hp'     => $request->no_hp,
            'password'   => Hash::make($request->password),
        ]);


        if ($customers) {
            //redirect dengan pesan sukses
            return redirect('/backend')->with('message', 'Data Berhasil Ditambahkan');
        } else {
            //redirect dengan pesan error
            return redirect()->route('/register')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
