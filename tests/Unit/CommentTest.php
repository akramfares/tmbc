<?php

namespace Tests\Unit;

use App\Http\Controllers\CommentController;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * Test comments transformation to tree.
     *
     * @return void
     */
    public function testCommentsTree() {
        $expected = '[{"id":1,"created_at":"2017-05-28 21:21:11","updated_at":"2017-05-28 21:21:11","name":"Akram Fares","comment":"This is a test comment","level":"0","comment_id":null,"children":[{"id":2,"created_at":"2017-05-28 21:21:18","updated_at":"2017-05-28 21:21:18","name":"Mick","comment":"This is a test reply","level":"1","comment_id":"1","children":[{"id":3,"created_at":"2017-05-28 21:21:25","updated_at":"2017-05-28 21:21:25","name":"Serena Williams","comment":"This is a second test reply","level":"2","comment_id":"2","children":[]}]}]}]';
        $data = json_decode('[{"id":1,"created_at":"2017-05-28 21:21:11","updated_at":"2017-05-28 21:21:11","name":"Akram Fares","comment":"This is a test comment","level":"0","comment_id":null},{"id":2,"created_at":"2017-05-28 21:21:18","updated_at":"2017-05-28 21:21:18","name":"Mick","comment":"This is a test reply","level":"1","comment_id":"1"},{"id":3,"created_at":"2017-05-28 21:21:25","updated_at":"2017-05-28 21:21:25","name":"Serena Williams","comment":"This is a second test reply","level":"2","comment_id":"2"}]');

        // Create controller
        $controller = new CommentController();
        // Execute function
        $result = $controller->getCommentsTree($data);

        // Assert expected equals result
        $this->assertEquals($expected, json_encode($result));
    }
}
