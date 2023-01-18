<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('guru.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        $login = auth()->guard('guru')
            ->attempt([
                'nip' => $request->nip,
                'password' => $request->password,
                'aktif' => 1
            ]);
        if($login) {
            $request->session()->regenerate();
            return redirect()->route('guru.home');
        }else{
            return back()->withErrors([
                'nip' => 'Kredensial tidal ditemukan.',
            ])->onlyInput('nip');
        }
    }

    public function logout()
    {
        auth()->guard('guru')->logout();
        session()->regenerate();

        return redirect()->route('guru.login.show');
    }
}
