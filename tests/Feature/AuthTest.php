<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function a_user_may_register_for_an_account_but_must_confirm_their_email()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $this->get('/')
             ->see('Laravel');

        $this->get('register');
    }
}
