<?php

namespace App\Http\Controllers\Admin;

use App\Events\SomeoneIsTryingToLogin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

        $admin = Admin::where('email', $request->email)
            ->where('aktif', 1)
            ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            throw ValidationException::withMessages([
                'email' => ['Kredensial tidak ditemukan.'],
            ]);
        }

        session()->put('admin_credentials', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        SomeoneIsTryingToLogin::dispatch($admin);

        return redirect()->route('admin.otp.show');
    }

    public function otpForm()
    {
        return view('admin.auth.otp');
    }

    public function verify(Request $request)
    {
        $checkOtp = Otp::where('code', $request->otp)->first();
        if (!$checkOtp) {
            throw ValidationException::withMessages([
                'otp' => ['OTP Salah.'],
            ]);
        }

        $credentials = session()->get('admin_credentials');

        auth()->guard('admin')
            ->attempt([
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]);
        $request->session()->regenerate();
        Otp::where('code', $request->otp)->delete();
        session()->forget('admin_credentials');
        return redirect()->route('admin.home');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        session()->regenerate();

        return redirect()->route('admin.login.show');
    }
}
