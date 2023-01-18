<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('operator.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login = auth()->guard('operator')
            ->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'jabatan' => 'Operator',
                'aktif' => 1
            ]);
        if($login) {
            $request->session()->regenerate();
            return redirect()->route('operator.home');
        }else{
            return back()->withErrors([
                'email' => 'Kredensial tidal ditemukan.',
            ])->onlyInput('email');
        }
    }

    public function logout()
    {
        auth()->guard('operator')->logout();
        session()->regenerate();

        return redirect()->route('operator.login.show');
    }
}
