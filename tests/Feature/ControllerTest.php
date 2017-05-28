<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerTest extends TestCase
{
    /**
     * Test home page.
     *
     * @return void
     */
    public function testHomeTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test Comments page.
     *
     * @return void
     */
    public function testCommentsTest()
    {
        $response = $this->get('comments');
        $response->assertStatus(200);
    }

    /**
     * Test Comments page.
     *
     * @return void
     */
    public function testCommentsViewTest()
    {

        $response = $this->get('comments');
        $expected = [
            "id" => 1,
            "level" => "0",
            "comment_id" => null
        ];
        $response->assertJsonFragment($expected);
    }
}
