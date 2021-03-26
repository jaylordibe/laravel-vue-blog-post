<?php


namespace Tests\Feature;


use Tests\TestCase;

class CommentTest extends TestCase {

    /**
     * Test create/add a comment.
     *
     * @return void
     */
    public function testCommentCreation() {
        $payload = [
            'username' => 'John Doe',
            'message' => 'Test comment'
        ];
        $response = $this->post('/api/comments', $payload);

        $response->assertSeeText($payload);
    }
}
