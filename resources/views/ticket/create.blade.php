
@extends('dashboard.index')
@section('content')
<div class="p-5 col-md-10 mx-auto">
  <div class="card px-5">
    {{-- <div class="card-body"> --}}
      <h1 class="card-title py-3">Create Ticket</h1>
      <hr>
      <form action="{{ route("ticket.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
      
        {{-- Title  --}}
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="title" value="{{ old('title') }}">
            @error('title')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
      
      
          {{-- Description  --}}
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control">
              {{ old('description') }}
            </textarea>
            @error('description')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
      
          {{-- Label  --}}
          <div class="mb-3">
            <h5>Label</h5>
            @foreach ($labels as $label)
              <input type="checkbox" value="{{ $label->id }}" name="label_id[]">
              <label for="exampleInputPassword1" class="form-label">{{ $label->name }}</label>
            @endforeach
          </select>
          @error('label_id')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      
          {{-- Category --}}
          <div class="mb-3">
            <h5>Category</h5>
              @foreach ($categories as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]">
                <label for="exampleInputPassword1"   class="form-label">{{ $category->name }}</label>
              @endforeach
            </select>
            @error('category_id')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
      
          {{-- Priority --}}
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Priority</label>
      
            <select class="form-select form-control" aria-label="Default select example" name="priority">
              <option value="0">Normal</option>
              <option value="1">Height</option>
            </select>
            @error('priority')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
      
          {{-- file upload --}}
      
          <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Multiple files input example</label>
            <input class="form-control" name="file[]" type="file" id="formFileMultiple" multiple>
          </div>
          <div class="mb-3">
              <button type="submit" class="btn btn-primary">Register</button>
          </div>
      </form>
    {{-- </div> --}}
  </div>
</div>
@endsection
