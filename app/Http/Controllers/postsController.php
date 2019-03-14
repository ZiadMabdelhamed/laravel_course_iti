<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\updatePostRequest;
use App\Rules\user_posts_limit;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class postsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::paginate(5);


//        dd($posts);
        return view('Posts.index')->with('posts',$posts);
    }

    public function create()
    {

        $users = User::all();
        return view('Posts.create')->with('users',$users);
    }


    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
//        dd($data['user_id']);

        $this->validate($request, ['user_id' => new user_posts_limit()]);
//        $data = $request->input();
//        $data['slug'] = 'test_slug';
//        dd($data);

        Post::create($data);
        return redirect(route('posts.index'));
    }

    public function show(Post $post)
    {

        return view('Posts.show')->with('post',$post);

    }

    public function edit(Post $post)
    {

        return view('Posts.edit')->with('post',$post);

    }

    public function update(updatePostRequest $request,$post)
    {


        $data = $request->input();
        Post::find($post)->update($data);

        return redirect(route('posts.index'));
    }


    public function destroy($post)
    {
//        dd($post);

        Post::find($post)->delete();

        return redirect(route('posts.index'));
    }
}
