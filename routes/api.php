<?php

use App\Http\Controllers\Api\GithubController;
use App\Models\GithubProfile;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

    // test routes
    Route::get('tokens',function(){
        return Token::all();
    });

    Route::get('profiles',function(){

        return ['profiles' => GithubProfile::with('token')->get()];
    });

    // Authenticate User
    Route::get('get-authenticated-user/{token}',[GithubController::class,'getAuthenticatedUser']);

    Route::get('update-authenticated-user/{token}',[GithubController::class,'updateUser']);

});

