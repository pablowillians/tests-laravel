<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewPostTest extends TestCase
{
    use RefreshDatabase;

    public function testViewPost()
    {
        $post = factory(Post::class)->create(['title' => 'My Title']);
        $response = $this->get('/api/post/' . $post->id);
        $response->assertStatus(200); // success!
        $response->assertJson([
            'id' => $post->id,
            'title' => 'My Title',
            'content' => $post->content,
            'created_at' => $post->created_at,
            'updated_at' => $post->updated_at,
        ]);
    }

    public function testViewPost_ShouldReturnNotFound()
    {
        $response = $this->get('/api/post/' . 111111111);
        $response->assertStatus(404); // not found!
        $response->assertSee('not found');
    }
}
