@extends('dashboard.index')
@section('content')
<div class="col-md-10 mx-auto p-5">
    <table class="table p-5 mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role == 0 ? "Admin" : ($user->role == 1 ? "Agent" : "Normal User")}}</td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="btn btn-warning px-3"><i class="fa fa-info"></i></a>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
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
