@extends('dashboard.index')
@section('content')
<div class="col-md-10 p-5 mx-auto">
    <table class="table p-5 mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Comment</th>
            <th>Author</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <th scope="row">{{ $comment->id }}</th>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>
                        <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-warning px-3"><i class="fa fa-info"></i></a>
                        <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="fa fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection
