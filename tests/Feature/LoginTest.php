<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp() : void {

        parent::setUp();

        $this->user =   $this->createUser();
    }

    public function createUser(){

        $user = User::factory()->create();
        return $user;
    }

    public function test_authenticated_user_access_profile_page()
    {
        $response = $this->actingAs($this->user)->get('profile');
        $response->assertValid();
        $response->assertSee('Profile Information');

        $response->assertStatus(200);
    }

    public function test_unauthenticated_user_cannot_access_profile_page(){
        $response = $this->get('profile');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    public function test_login_redirects_to_dashboard(){

        User::create([
            'name' => 'amir',
            'email' => 'afayazbakhsh22@gmail.com',
            'password' => bcrypt('amir8787')
        ]);

        $response = $this->post('/login',[

            'email' => 'afayazbakhsh22@gmail.com',
            'password' => 'amir8787'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('dashboard');
    }
}
