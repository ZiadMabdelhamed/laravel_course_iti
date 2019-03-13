@extends('layouts.app')


@section('content')
    <form action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" value="{{@$post->title}}" aria-describedby="emailHelp" placeholder="Enter email" name="title">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" class="form-control">{{@$post->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" class="form-control">{{@$post->user->name}}</textarea>
        </div>
        {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
    </form>
@endsection