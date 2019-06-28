<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    public function list();

    public function view(int $postId);

    public function delete(int $postId);

    public function create(string $title, string $content);

    public function update(int $postId, array $postData);
}
