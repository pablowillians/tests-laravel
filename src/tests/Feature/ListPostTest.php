<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListPostTest extends TestCase
{
    use RefreshDatabase;

    public function testListPost()
    {
        factory(Post::class)->times(10)->create();
        $response = $this->get('/api/post');
        $response->assertStatus(200); // success!
        $response->assertJsonCount(10);
    }
}
