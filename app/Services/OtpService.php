<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OtpService
{

    public function __construct()
    {
        # code...
    }

    public function generate($guard)
    {
        $code = fake()->randomNumber(4, true);
        //send the otp via mobile
        Log::info('Your OTP is ' . $code);

        return auth()->guard($guard)
            ->user()
            ->otp()
            ->create([
                'code' => $code,
                'expires_at' => Carbon::now()->addMinutes(5)
            ]);
    }
}
