<?php

namespace App\Observers;

use App\Jobs\UpdateUserGithubProfile;
use App\Models\GithubProfile;
use Illuminate\Support\Facades\Log;

class GithubProfileObserver
{
    /**
     * Handle the GithubProfile "created" event.
     *
     * @param  \App\Models\GithubProfile  $githubProfile
     * @return void
     */
    public function created(GithubProfile $githubProfile)
    {
        //
    }

    /**
     * Handle the GithubProfile "updated" event.
     *
     * @param  \App\Models\GithubProfile  $githubProfile
     * @return void
     */
    public function updated(GithubProfile $githubProfile)
    {
        UpdateUserGithubProfile::dispatch($githubProfile);
    }

    /**
     * Handle the GithubProfile "deleted" event.
     *
     * @param  \App\Models\GithubProfile  $githubProfile
     * @return void
     */
    public function deleted(GithubProfile $githubProfile)
    {
        //
    }

    /**
     * Handle the GithubProfile "restored" event.
     *
     * @param  \App\Models\GithubProfile  $githubProfile
     * @return void
     */
    public function restored(GithubProfile $githubProfile)
    {
        //
    }

    /**
     * Handle the GithubProfile "force deleted" event.
     *
     * @param  \App\Models\GithubProfile  $githubProfile
     * @return void
     */
    public function forceDeleted(GithubProfile $githubProfile)
    {
        //
    }
}
