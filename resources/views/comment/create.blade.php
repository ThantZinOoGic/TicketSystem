@extends('dashboard.index')
@section('content')
<div class="p-5 mx-auto col-md-10">
  <form action="{{ route('comment.store') }}" method="post" class="mt-5 p-5 card">
    @csrf
    @method('post')
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="comment" aria-describedby="button-addon2" name="comment">
      @error('comment')
        <small class="text-danger">{{ $message }}</small>
      @enderror
      <button class="btn btn-primary" type="submit" id="button-addon2">Send</button>
    </div>
  </form>
</div>
@endsection
