<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function list()
    {
        return Post::all();
    }

    public function view(int $postId)
    {
        return Post::find($postId);
    }

    public function delete(int $postId)
    {
        return Post::where('id', $postId)->delete();
    }

    public function create(string $title, string $content)
    {
        $post = new Post();
        $post->title = $title;
        $post->content = $content;

        $post->save();

        return $post;
    }

    public function update(int $postId, array $postData)
    {
        $post = Post::find($postId);

        $post->title = $postData['title'];
        $post->content = $postData['content'];

        $post->save();

        return $post;
    }
}
