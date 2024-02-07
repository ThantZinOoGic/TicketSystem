@extends('dashboard.index')
@section('content')

<div class="p-5">
    @foreach ($tickets as $ticket)
        <div class="card col-md-8 p-5">
            <div class="row justify-content-around align-items-center">
                <div>{{ $ticket->title }}</div>
                <div>{{ $ticket->priority =="0" ? "Normal" : "Height" }}</div>
                <div>{{ $ticket->status == "0" ? "Close" : "Open" }}</div>
                <div>
                    <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-warning px-3"><i class="fa fa-info"></i></a>

                    @if(Auth::user()->role == "0")
                        <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="fa fa-trash-can"></i></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th>Category</th>
        <th>Label</th>
        <th>Priority</th>
        <th>File</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($tickets as $ticket)
            <tr>
                <th scope="row">{{ $ticket->id }}</th>
                <td>{{ $ticket->title }}</td>
                <td>
                    @foreach ($ticket->categories as $category)
                    {{ $category->name }}
                    @endforeach
                </td>
                <td>
                    @foreach ($ticket->labels as $label)
                        {{ $label->name }}
                    @endforeach
                </td>
                <td>{{ $ticket->priority == 0? "Normal" : "Height" }}</td>
                @if ($ticket->file)
                    <td>
                        @foreach (explode(",",$ticket->file) as $file)
                            <img src="{{ asset('storage/gallery/'.$file) }}" alt="" width="50px" height="50px">
                        @endforeach
                    </td>
                @else
                    <td>No File</td>
                @endif
                <td>
                    <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-warning px-3"><i class="fa fa-info"></i></a>
                    <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                    <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="fa fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
            
        @endforeach
    </tbody>
</table> --}}
@endsection
