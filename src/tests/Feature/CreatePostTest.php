<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatePost()
    {
        $myPost = ['title' => 'Awesome Post Title', 'content' => 'Amazing content'];
        $response = $this->post('/api/post', $myPost);
        $response->assertStatus(201); // created!
        $response->assertJson(['data' => $myPost]);
        $this->assertDatabaseHas('posts', $myPost);
    }
}
