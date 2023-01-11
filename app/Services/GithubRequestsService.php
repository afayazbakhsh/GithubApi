<?php

namespace App\Services;

use App\Actions\HandleRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GithubRequestsService
{
    private $request;

    public function __construct(HandleRequests $request)
    {

        return $this->request = $request;
    }

    // Get Authenticated User
    public function getAuthenticatedUser($token)
    {

        return $this->request->handle($token, 'user', 'get');
    }

    // Update Authenticated User
    public function updateUser($token, $body)
    {

        return $this->request->handle($token, 'user', 'patch', $body);
    }

    //     // Get All Users In Github
    // public function users(){

    //     $param = [
    //         'since' => 100,
    //         'per_page' => 50,
    //     ];

    //     return $this->request->handle('users','get' , $param);
    // }

    //     // Get User By Username
    // public function getUser(Request $request){

    //     return $this->request->handle('users/'.$request->username,'get');
    // }

    //     // Get Repositories
    // public function getRepo(){

    //    return $this->request->handle('user/repos','get');
    // }
}
