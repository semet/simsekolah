<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('siswa.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required'
        ]);

        $login = auth()->guard('siswa')
            ->attempt([
                'nis' => $request->nis,
                'password' => $request->password,
                'aktif' => 1
            ]);
        if($login) {
            $request->session()->regenerate();
            return redirect()->route('siswa.home');
        }else{
            return back()->withErrors([
                'nip' => 'Kredensial tidal ditemukan.',
            ])->onlyInput('nip');
        }
    }

    public function logout()
    {
        auth()->guard('siswa')->logout();
        session()->regenerate();

        return redirect()->route('siswa.login.show');
    }
}
