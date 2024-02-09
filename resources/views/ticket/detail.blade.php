@extends('dashboard.index')
@section('content')
{{-- <div class="row justify-content-around">
  <div class="col-md-6 p-5">
    <h3 class="text-center">{{ $ticket->title }}</h3>
    <table class="table">
      <tr>
        <th>#</th>
        <th>Detail</th>
      </tr>
      <tr>
        <th>Title</th>
        <td>{{ $ticket->title }}</td>
      </tr>
      <tr>
        <th>Agent Name</th>
        <td>{{ $ticket->agent ?  $ticket->agent->name : "-"}}</td>
      </tr>
      <tr>
        <th>Description</th>
        <td>{{ $ticket->description }}</td>
      </tr>
      <tr>
        <th>Category</th>
        <td>
          <ul class="p-0" type='none'>
            @foreach ($ticket->categories as $category)
              <li>{{ $category->name}}</li>
            @endforeach
          </ul>
        </td>
      </tr>
      <tr>
        <th>Label</th>
        <td>
          <ul class="p-0" type='none'>
            @foreach ($ticket->labels as $label)
              <li>{{ $label->name}}</li>
            @endforeach
          </ul>
        </td>
      </tr>
      <tr>
        <th>Priority</th>
        <td>{{ $ticket->priority == 0 ? "Nomal" : "Height" }}</td>
      </tr>
      <tr>
        <th>Status</th>
        <td>{{ $ticket->status == 0 ? "close" : "open" }}</td>
      </tr>
      <tr>
        <th>File</th>
        <td>
          @if ($ticket->file)
          @foreach (explode(",",$ticket->file) as $file)
              <img src="{{ asset('storage/gallery/'.$file) }}" alt="" width="50px" height="50px">
          @endforeach
          @else
            No File
          @endif
        </td>
      </tr>

    </table>
    @if( Auth::user()->role == '0' || Auth::user()->id == $ticket->agent_id)
    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
    @endif
  </div>

  {{-- comment section  --}}
  {{-- <div class=" col-md-5 mt-5">
    <div class="card p-4">
      <h4 class="mb-3">Comments</h4>
      @foreach ($ticket->comments as $comment)
        <div >
          <div class="d-flex justify-content-between align-items-end mb-3">
            <div>
              <h4><i class="fa fa-user"></i> {{ $comment->user->name }}</h4>
            </div>
            <div>
              <td>
                <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-warning px-3"><i class="fa fa-info"></i></a>
                <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger"><i class="fa fa-trash-can"></i></button>
                </form>
            </td>
            </div>
          </div>
          <div>{{ $comment->body }}</div>
          <hr>
        </div>
      @endforeach
    </div>
    <form action="{{ route('comment.store') }}" method="post" class="mt-5 p-5 card">
      @csrf
      @method('post')
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="comment" aria-describedby="button-addon2" name="body">
        <input type="hidden" name="ticked_id" value="{{ $ticket->id }}">
        <button class="btn btn-primary" type="submit" id="button-addon2">Send</button>
      </div>
    </form>
  </div>
</div> --}}

<div class="row justify-content-around">
  <div class="col-md-6 mt-5">
    <div class="card">
      <div class="mt-4">
        <h3 class="text-center">{{ $ticket->title }}</h3>
      </div>
      <div class="card-body">
        <table class="table">
          <tr>
            <th>#</th>
            <th>Detail</th>
          </tr>
          <tr>
            <th>Title</th>
            <td>{{ $ticket->title }}</td>
          </tr>
          <tr>
            <th>Agent Name</th>
            <td>{{ $ticket->agent ?  $ticket->agent->name : "-"}}</td>
          </tr>
          <tr>
            <th>Description</th>
            <td>{{ $ticket->description }}</td>
          </tr>
          <tr>
            <th>Category</th>
            <td>
              <ul class="list-unstyled">
                @foreach ($ticket->categories as $category)
                  <li>{{ $category->name}}</li>
                @endforeach
              </ul>
            </td>
          </tr>
          <tr>
            <th>Label</th>
            <td>
              <ul class="list-unstyled">
                @foreach ($ticket->labels as $label)
                  <li>{{ $label->name}}</li>
                @endforeach
              </ul>
            </td>
          </tr>
          <tr>
            <th>Priority</th>
            <td>{{ $ticket->priority == 0 ? "Normal" : "High" }}</td>
          </tr>
          <tr>
            <th>Status</th>
            <td>{{ $ticket->status == 0 ? "Closed" : "Open" }}</td>
          </tr>
          <tr>
            <th>File</th>
            <td>
              @if ($ticket->file)
                @foreach (explode(",",$ticket->file) as $file)
                  <img src="{{ asset('storage/gallery/'.$file) }}" alt="" width="50px" height="50px">
                @endforeach
              @else
                No File
              @endif
            </td>
          </tr>
        </table>
        @if( Auth::user()->role == '0' || Auth::user()->id == $ticket->agent_id)
          <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
        @endif
      </div>
    </div>
  </div>

  {{-- comment section  --}}
  <div class="col-md-5 mt-5">
    <div class="card p-4">
      <div class="card-header">
        <h4 class="mb-3">Comments</h4>
      </div>
      <div class="card-body">
        @foreach ($ticket->comments as $comment)
          <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h5><i class="fa fa-user"></i> {{ $comment->user->name }}</h5>
              </div>
              @if(Auth::user()->role == '0' || Auth::user()->id == $comment->user_id)
              <div class="d-flex">
                {{-- <a href="{{ route('comment.show', $comment->id) }}" class="btn btn-warning mx-2"><i class="fa fa-info"></i></a> --}}
                <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-warning mx-2"><i class="fa fa-pencil"></i></a>
                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger mx-2"><i class="fa fa-trash-can"></i></button>
                </form>
              </div>
              @endif

            </div>
            <div class="mt-2">{{ $comment->body }}</div>
          </div>
          <hr>
        @endforeach
      </div>
    </div>
    <form action="{{ route('comment.store') }}" method="post" class="mt-5 p-5 card">
      <div class="card-header">
        <h4 class="mb-3">Add Comment</h4>
      </div>
      <div class="card-body">
        @csrf
        @method('post')
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Type your comment here" aria-describedby="button-addon2" name="body">
          <input type="hidden" name="ticked_id" value="{{ $ticket->id }}">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2">Send</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


@endsection
