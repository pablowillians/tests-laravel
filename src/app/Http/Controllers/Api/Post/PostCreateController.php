<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    private $postRepository;

    function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(Request $request)
    {
        $post = $this->postRepository->create($request->input('title'), $request->input('content'));

        return response()->json(['data' => $post], 201);
    }
}
