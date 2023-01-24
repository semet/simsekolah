<?php

namespace App\Listeners;

use App\Events\KepsekCreated;
use App\Mail\WelcomeEmail;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Mail;

class WelcomeKepsek implements ShouldQueue
{
    use InteractsWithQueue;

    public $connection = 'database';


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
     * @param  \App\Events\KepsekCreated  $event
     * @return void
     */
    public function handle(KepsekCreated $event)
    {
        try {
            DB::table('email_verifications')
                ->insert([
                    'id' => Str::uuid(),
                    'user_id' => $event->kepsek->id
                ]);

            Mail::to($event->kepsek->email)->send(new WelcomeEmail($event->kepsek));
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
