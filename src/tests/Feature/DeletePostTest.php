<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePostTest extends TestCase
{
    use RefreshDatabase;

    public function testDeletePost()
    {
        $post = factory(Post::class)->create();
        $response = $this->delete('/api/post/' . $post->id);
        $response->assertStatus(200); // success!
        $response->assertSee('deleted!');
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function testDeletePost_ShouldReturnNotFound()
    {
        $response = $this->delete('/api/post/' . 11111111);
        $response->assertStatus(404); // not found!
        $response->assertSee('not found');
    }
}
