@extends('layouts.app')


@section('content')
    <form action="{{route('posts.update',$post->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" value="{{@$post->title}}" aria-describedby="emailHelp" placeholder="Enter email" name="title">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" class="form-control">{{@$post->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


