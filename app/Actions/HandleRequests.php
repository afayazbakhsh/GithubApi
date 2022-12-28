<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class HandleRequests
{

    public function handle($token = null, $requestPath, $requestMethod, array $requestBody = null)
    {

        return Http::withToken($token)->accept('application/vnd.github+json')
            ->withHeaders([

                'X-GitHub-Api-Version' => '2022-11-28',
            ])
            ->timeout(10)
            ->$requestMethod(env('GITHUB_API_LINK') . $requestPath, $requestBody);
    }
}
