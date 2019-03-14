@extends('layouts.app')


@section('content')
    <a href="{{route('posts.create')}}">Create new</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Creator</th>
            <th>Slug</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{@$post->user->name}}</td>
                <td>{{$post->slug}}</td>
                <td><a href="/posts/{{$post->id}}/edit">EDIT</a></td>
                <td><a type="button"  row_id="{{$post->id}}" data-toggle="modal" data-target="#exampleModal" id="delete_toggle">
                        Delete
                    </a>
                </td>

            </tr>

        @endforeach


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you to delete this item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <form id="form_delete" method="POST" action="{{route('posts.destroy',$post->id)}}" >
                            @csrf
                            @method('DELETE')

                            <button type="submit"  id="delete_item" type="button" class="btn btn-primary">Yes</button>
                        </form>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                    </div>
                </div>
            </div>
        </div>

        </tbody>
    </table>

    {{ $posts->links() }}


@endsection

@section('extra_script')

    <script>
        $(document).on('click','#delete_toggle',function () {
            var delete_id = $(this).attr('row_id');
            $('#form_delete').attr('action','/posts/'+delete_id);


            // $('#form_delete').attr('action')

        });
    </script>
@endsection