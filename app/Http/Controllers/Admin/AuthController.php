<?php

namespace App\Http\Controllers\Admin;

use App\Events\SomeoneIsTryingToLogin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Otp;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * show Login form
     *
     * @return void
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }
    /**
     * process login
     *
     * @param Request $request
     * @return mix
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $login = auth()->guard('admin')
            ->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'aktif' => 1,
            ]);
        if ($login) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        } else {
            return back()->withErrors([
                'email' => 'Kredensial tidal ditemukan.',
            ])->onlyInput('email');
        }
    }
    /**
     * Display OTP form
     *
     * @return void
     */
    public function otpForm()
    {
        return view('admin.auth.otp');
    }
    /**
     * verify OTP
     *
     * @param Request $request
     * @return mix
     */
    public function verifyOtp(Request $request)
    {
        try {
            $otp = Otp::where('code', $request->otp)->first();
            $now = Carbon::now();
            if (!$otp) {
                return back()->with('error', 'Invalid OTP');
            } elseif ($otp && $now->isAfter($otp->expires_at)) {
                return back()->with('error', 'OTP is Expired');
            }
            $otp->update([
                'expires_at' => Carbon::now()
            ]);
            auth()->guard('admin')->user()->update([
                'otp_verified_at' => Carbon::now()
            ]);
            return redirect()->route('admin.home');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        auth()->guard('admin')->user()->update([
            'otp_verified_at' => null
        ]);
        auth()->guard('admin')->logout();
        session()->regenerate();

        return redirect()->route('admin.login.show');
    }
}
