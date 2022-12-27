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

        // Get repositories
    public function getRepo(){

       return $this->request->handle('https://api.github.com/user/repos','get');
    }
}
