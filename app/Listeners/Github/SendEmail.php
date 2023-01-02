<?php

namespace App\Listeners\Github;

use App\Events\Github\UserProfileCreated;
use App\Mail\GithubProfileSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserProfileCreated $event)
    {
        $email = $event->profile->email;
        Mail::to($email)
            ->queue(new GithubProfileSaved ($event->profile));
        Log::info($email);
    }
}
