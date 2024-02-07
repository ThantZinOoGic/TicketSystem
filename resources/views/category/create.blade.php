@extends('dashboard.index')
@section('content')
<div class="p-5 mx-auto col-md-10">
<form action="{{ route('category.store') }}" method="post" class="mt-5 p-5 card">
  @csrf
  @method('post')
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Create Category</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{ old('name') }}">
      @error('name')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
    <div>
        <button class="btn btn-primary">Register</button>
    </div>
</form>
</div>
@endsection
