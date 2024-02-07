@extends('dashboard.index')
@section('content')
<div class="p-5 mx-auto col-md-10">
<form action="{{ route('category.update', $category->id) }}" method="post" class="mt-5 p-5 card">
  @csrf
  @method('put')
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Username</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{ old('name',$category->name) }}">
    </div>
    <div>
        <button class="btn btn-primary">Update</button>
    </div>
</form>
</div>
@endsection
