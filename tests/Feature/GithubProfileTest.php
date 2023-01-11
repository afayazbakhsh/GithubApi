<?php

namespace Tests\Feature;

use App\Models\GithubProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class GithubProfileTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_profiles_of_users()
    {

        $profile = GithubProfile::find(1);

        $response = $this->get('api/v1/profiles');
        $response->assertSee('profiles');
        $response->assertJson(function (AssertableJson $json) use ($profile) {

            $json->has(1)->etc();
        });
        $response->assertStatus(200);
    }
}
