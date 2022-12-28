<?php

namespace App\Jobs;

use App\Models\Token;
use App\Services\GithubRequestsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GetUserGithubProfileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GithubRequestsService $service)
    {
        // get authenticated user data
        $githubUser = $service->getAuthenticatedUser($this->token->token);

        // create github profile data

        Log::info($githubUser);

    }
}
