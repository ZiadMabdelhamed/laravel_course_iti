<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Rules\user_posts_limit;
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


    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $this->validate($request, ['user_id' => new user_posts_limit()]);

        $post = Post::create($data);

        return new PostsResource($post);
    }


}
