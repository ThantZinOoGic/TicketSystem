@extends('dashboard.index')
@section('content')
<div class="col-md-10 p-5 mx-auto">
<table class="table p-5 mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
        </tr> 
    </tbody>
</table>
</div>
@endsection
