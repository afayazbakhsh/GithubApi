<?php

use App\Http\Controllers\Api\GithubController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function(){

    // Authenticate User
    Route::get('get-authenticated-user',[GithubController::class,'getAuthenticatedUser']);
    Route::get('update-user',[GithubController::class,'updateUser']);

    // Users
    Route::get('users',[GithubController::class,'users']);
    // user by username
    Route::get('users/{username}',[GithubController::class,'getUser']);

    Route::get('get-repositories',[GithubController::class,'getRepo']);
});

