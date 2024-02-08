@extends('dashboard.index')
@section('content')
<div class="p-5 mx-auto col-md-10">
  <form action="{{ route('comment.update', $comment->id) }}" method="post" class="mt-5 p-5 card">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="body" value="{{ old('name',$comment->body) }}">
      </div>
      <div>
          <button class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
@endsection
