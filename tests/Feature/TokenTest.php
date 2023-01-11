<?php

namespace Tests\Feature;

use App\Models\Token;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Testing\Fluent\AssertableJson;

class TokenTest extends TestCase
{

    use WithoutModelEvents;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_token_is_true()
    {
        $response = $this->get('api/v1/get-authenticated-user/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');

        $response->assertStatus(200);
    }

    public function test_store_token()
    {

        $token = Token::withoutEvents(function () {

            Token::updateOrCreate([

                'token' => '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',
            ]);
        });


        $response = $this->get('api/v1/tokens');

        $response->assertStatus(200)->assertJson(
            fn (AssertableJson $json) =>

            $json->has(1)
                ->first(fn ($json) =>

                    $json->has('token')
                    ->where('id', 1)
                    ->whereType('token', 'string|null')
                    ->missing('fake_arguman')
                    ->etc()
                )
        );
    }
}
