<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_home_page_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    
    public function test_about_page_returns_successful_response(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }
}
