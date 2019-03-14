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
                <td><a type="button"  row_id="{{$post->id}}" data-toggle="modal" data-target="#exampleModal2" id="show_ajax_toggle">
                        Show Ajax
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
                        <form id="form_delete" method="POST" action="{{route('posts.destroy',$post->id)}}">
                            <div id="csrf_value"  hidden >@csrf</div>
                            {{--@method('DELETE')--}}
                            <button type="submit"  id="delete_item" type="button" class="btn btn-primary">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        </form>

                    </div>
            </div>
        </div>
        </div>
        </tbody>
    </table>


    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">show post details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>



    {{ $posts->links() }}


@endsection

@section('extra_script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).on('click','#delete_toggle',function () {
            var delete_id = $(this).attr('row_id');
            var csrf = $('#csrf_value').find('input').val();
            var csrf_div = '<input type="hidden" name="_token" value="'+csrf+'">';
            var method_delete_div = '<input type="hidden" name="_method" value="DELETE">';


            // alert(csrf);
            $('#form_delete').attr('action','/posts/'+delete_id).append(csrf_div).append(method_delete_div);


        });

        $(document).on('click','#delete_item',function () {
            $('#form_delete').submit();
        });
    </script>


    <script>
        $(document).on('click','#show_ajax_toggle',function () {
            var post_id = $(this).attr('row_id');
            // $('#form_delete').attr('action','/posts/'+delete_id);
            alert(post_id);
        });
    </script>
@endsection