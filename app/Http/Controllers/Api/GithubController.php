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
    public function getAuthenticatedUser(Request $request)
    {

        $response = $this->service->getAuthenticatedUser($request->token);

        if ($response['message'] ?? null) {

            return response('Token does not have access', 401);
        } else {

            return response($response, 200);
        }
    }

    public function updateUser(Request $request)
    {

        return $response = $this->service->updateUser($request->token, [
            'name' => 'Amir Fayazbakhsh',
            'blog' => 'https://github.com/afayazbakhsh'
        ]);
    }
}
