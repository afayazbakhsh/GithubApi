<?php

namespace App\Jobs;

use App\Events\Github\UserProfileCreated;
use App\Models\GithubProfile;
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
        $profile = $this->token->githubProfile()->create([

            'name'              => $githubUser['name'],
            'username'          => $githubUser['login'],
            'avatar'            => $githubUser['avatar_url'],
            'followers_count'   => $githubUser['followers'],
            'following_count'   => $githubUser['following'],
            'bio'               => $githubUser['bio'],
            'email'             => $githubUser['email'],
            'public_repos_count'=> $githubUser['public_repos'],
            'link'              => $githubUser['html_url']

        ]);

        if($githubUser['email']){

            event(new UserProfileCreated($profile));
        }

        Log::info($profile);
    }
}
