<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Test;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_all_tests_from_api(): void
    {
        Test::factory()->count(10)->create();
        $response = $this->getJson(route('tests.index'));
        $response->assertStatus(200)->assertJsonCount(10, 'data')->assertJsonStructure(
            ['data' => [['name']]]);
    }

    public function test_no_dumps_inside_code(): void
    {

    }
}
