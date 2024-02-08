@extends('dashboard.index')
@section('content')
<div class="p-5 mx-auto col-md-10">
  <form action="{{ route('label.update', $label->id) }}" method="post" class="mt-5 p-5 card">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputPassword1" name="name" value="{{ old('name',$label->name) }}">
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div>
          <button class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
@endsection
