@extends('dashboard.index')
@section('content')

<div class="p-5">
    <table class="table col-md-8 p-5">
    <tr>
        <th>Title</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach ($tickets as $ticket)
            <tr class="">
                <td>{{ $ticket->title }}</td>
                <td>
                    <div  class="{{ $ticket->priority == "0" ? "bg-success" : "bg-danger" }} text-center py-1 rounded">
                        {{ $ticket->priority =="0" ? "Normal" : "Height" }}
                    </div>
                </td>
                <td>
                    <div  class="{{ $ticket->status == "0" ? "bg-success" : "bg-danger" }} text-center py-1 rounded">
                        {{ $ticket->status == "0" ? "Close" : "Open" }}
                    </div>
                </td>
                <td>
                    <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-warning"><i class="fa fa-info"></i></a>

                    @if(Auth::user()->role == "0")
                        <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <form action="{{ route('ticket.destroy', $ticket->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="fa fa-trash-can"></i></button>
                        </form>
                    @endif
                </td>
            </tr>
    @endforeach
</table>

</div>

@endsection
