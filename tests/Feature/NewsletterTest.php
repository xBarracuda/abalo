<?php

namespace Tests\Feature;

use Database\Seeders\DevelopmentData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_new_newsletter_entry() : void
    {
        $this->post('/subscribe', [
           'email' => 'test@test.com',
        ]);

        $this->assertDatabaseCount('newsletter',1);
    }

    public function test_invalid_mail() : void
    {
        $this->post('/subscribe', [
            'email' => 'INVALID_MAIL',
        ]);


        $this->assertDatabaseEmpty('newsletter');
    }
}
