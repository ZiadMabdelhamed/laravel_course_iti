<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostsResource;

class PostsController extends Controller
{
    //


    public function index()
    {
        $posts = Post::paginate(5);
        return PostsResource::collection($posts);
    }


    public function show(Post $post)
    {
        return new PostsResource($post);
    }


}
