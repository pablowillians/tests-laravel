<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostUpdateController extends Controller
{
    private $postRepository;

    function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function update(Request $request, int $postId)
    {
        $post = $this->postRepository->update($postId, $request->input());
        return response()->json(['data' => $post], 200);
    }
}
