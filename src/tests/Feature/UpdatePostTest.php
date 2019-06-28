<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdatePost()
    {
        $post = factory(Post::class)->create();
        $myPost = ['title' => 'Awesome Post Title', 'content' => 'Amazing content'];
        $response = $this->put('/api/post/' . $post->id, $myPost);
        $response->assertStatus(200); // success!
        $response->assertJson(['data' => $myPost]);
        $this->assertDatabaseHas('posts', $myPost);
    }
}
