<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostDeleteController extends Controller
{
    private $postRepository;

    function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function delete(Request $request, int $postId)
    {
        if ($this->postRepository->delete($postId)) {
            return response()->json('deleted!');
        }

        return response()->json('not found', 404);
    }
}
