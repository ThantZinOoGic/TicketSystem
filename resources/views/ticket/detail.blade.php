@extends('dashboard.index')
@section('content')
<div class="row justify-content-around">
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
    @if( Auth::user()->role == '0')
    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-warning">Edit</a>
    @endif
  </div>

  {{-- comment section  --}}
  <div class=" col-md-5 mt-5">
    <div>
      @foreach ($ticket->comments as $comment)
        <div class="card p-2">
          <h4>{{ $comment->user->name }}</h4>
          <div>{{ $comment->body }}</div>
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
</div>

@endsection
