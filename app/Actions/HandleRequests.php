<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class HandleRequests {

    public function handle($url,$requestMethod,$data = null){

        return Http::withToken(env('GITHUB_TOKEN'))->accept('application/vnd.github+json')
        ->withHeaders([

            'X-GitHub-Api-Version' => '2022-11-28',
        ])
        ->$requestMethod($url , $data);

    }
}
