<?php

namespace App\Http\Controllers\Api;

use App\Actions\HandleRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GithubController extends Controller
{
    private $request;

    public function __construct(HandleRequests $request){

        return $this->request = $request;
    }

        // Get Authenticated User
    public function getAuthenticatedUser(){

        return $this->request->handle('user','get');
    }

        // Update Authenticated User
    public function updateUser(){

        return $this->request->handle('user/','patch');
    }

        // Get All Users In Github
    public function users(){

        $param = [
            'since' => 100,
            'per_page' => 50,
        ];

        return $this->request->handle('users','get' , $param);
    }

        // Get User By Username
    public function getUser(Request $request){

        return $this->request->handle('users/'.$request->username,'get');
    }

        // Get Repositories
    public function getRepo(){

       return $this->request->handle('user/repos','get');
    }
}
