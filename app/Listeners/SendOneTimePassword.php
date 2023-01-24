<?php

namespace App\Listeners;

use App\Events\SomeoneIsTryingToLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SendOneTimePassword
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SomeoneIsTryingToLogin  $event
     * @return void
     */
    public function handle(SomeoneIsTryingToLogin $event)
    {
        $otpCode = fake()->randomNumber(4, true);
        DB::table('otps')->insert([
            'id' => Str::uuid(),
            'user_id' => $event->user->id,
            'code' => $otpCode
        ]);
        Log::info('your OTP is ' . $otpCode);
    }
}
