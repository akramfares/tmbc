<?php

namespace Tests\Unit;

use App\Http\Controllers\CommentController;
use Tests\TestCase;
use Illuminate\Contracts\Filesystem;

class CommentTest extends TestCase
{
    /**
     * Test comments transformation to tree.
     *
     * @return void
     */
    public function testCommentsTree()
    {
        $expected = file_get_contents(__DIR__."/data/comment-expected.json");
        $data = json_decode(file_get_contents(__DIR__."/data/comment-data.json"));

        // Create controller
        $controller = new CommentController();
        // Execute function
        $result = $controller->getCommentsTree($data);

        // Assert expected equals result
        $this->assertJsonStringEqualsJsonString($expected, json_encode($result));
    }
}
