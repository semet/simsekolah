<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login = auth()->guard('admin')
            ->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'aktif' => 1
            ]);
        if($login) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }else{
            return back()->withErrors([
                'email' => 'Kredensial tidal ditemukan.',
            ])->onlyInput('email');
        }
    }
}
