<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesControllerTest extends TestCase
{
    //Success load of view
    public function test_index_load_the_index_view()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function test_load_the_backend()
    {
        $response = $this->get('/1438');
        $response->assertStatus(200);
    }
    public function test_about_load_the_about_view()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }
    public function test_resume_load_the_resume_view()
    {
        $response = $this->get('/resume');
        $response->assertStatus(200);
    }
    public function test_portfolio_load_the_portfolio_view()
    {
        $response = $this->get('/portfolio');
        $response->assertStatus(200);
    }
}
