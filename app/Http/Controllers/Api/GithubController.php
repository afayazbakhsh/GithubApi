<?php

namespace App\Http\Controllers\Api;

use App\Actions\HandleRequests;
use App\Http\Controllers\Controller;
use App\Services\GithubRequestsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GithubController extends Controller
{
    public $service;

    public function __construct(GithubRequestsService $service)
    {
        $this->service = $service;
    }
    public function is_token_currect(Request $request){

        $response =  $this->service->getAuthenticatedUser($request->token);
        Log::info($response);

        if($response->status() == 200){

            return true;
        }

        return $response;
    }
}
