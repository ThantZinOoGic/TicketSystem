@extends('dashboard.index')
@section('content')
<div class="col-md-10 p-5 mx-auto">
  <table class="table mt-5 p-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>

        </tr> 
    </tbody>
</table>
</div>
@endsection
