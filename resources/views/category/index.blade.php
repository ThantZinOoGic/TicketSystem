@extends('dashboard.index')
@section('content')
<div class="col-md-10 p-5 mx-auto">
<table class="table p-5 mt-5">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-warning px-3"><i class="fa fa-info"></i></a>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
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
