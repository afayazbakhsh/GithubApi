<?php

namespace App\Observers;

use App\Jobs\GetUserGithubProfileJob;
use App\Models\Token;

class TokenObserver
{
    /**
     * Handle the Token "created" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function created(Token $token)
    {
        GetUserGithubProfileJob::dispatch($token);
    }

    /**
     * Handle the Token "updated" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function updated(Token $token)
    {
        //
    }

    /**
     * Handle the Token "deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function deleted(Token $token)
    {
        //
    }

    /**
     * Handle the Token "restored" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function restored(Token $token)
    {
        //
    }

    /**
     * Handle the Token "force deleted" event.
     *
     * @param  \App\Models\Token  $token
     * @return void
     */
    public function forceDeleted(Token $token)
    {
        //
    }
}
