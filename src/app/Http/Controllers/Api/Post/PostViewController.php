<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostViewController extends Controller
{
    private $postRepository;

    function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function view(Request $request, int $postId)
    {
        return $this->postRepository->view($postId) ?? response()->json('not found', 404);
    }
}
