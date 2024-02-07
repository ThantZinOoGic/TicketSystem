@extends('dashboard.index')
@section('content')
<div class="col-md-8 mx-auto p-5">
  <form action="{{ route('user.store') }}" method="post" class="card mt-5 p-5">
    @csrf
    @method('post')
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{ old('name') }}">
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email') }}">
        @error('email')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="{{ old('password') }}">
          @error('password')
            <small class="text-danger">{{ $message }}</small>
          @enderror
      </div>
      <div class="mb-3">
        <h6 class="form-label">Role</h6>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="2" chacked>
          <label class="form-check-label" for="flexRadioDefault1">
            Normal User
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="1">
          <label class="form-check-label" for="flexRadioDefault2">
            Agent
          </label>
        </div>
      </div>
      <div>
          <button class="btn btn-primary">Register</button>
      </div>
  </form>
</div>
@endsection
