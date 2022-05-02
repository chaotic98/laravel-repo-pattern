<?php

namespace App\Repositories\Post;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    public function deletePost($id)
    {
        Post::destroy($id);
    }

    public function createPost(array $postDetails)
    {
        Post::create($postDetails);
    }

    public function updatePost($id, array $newData)
    {
       Post::findOrFail($id)->update($newData);
    }
}
