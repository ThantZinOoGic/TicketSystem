{{-- @dd($ticket->labels->contain) --}}
@extends('dashboard.index')
@section('content')
<div class="p-5 col-md-10 mx-auto">
  <form action="{{ route("ticket.update", $ticket->id) }}" method="post" enctype="multipart/form-data" class=" p-5 card">
    @csrf
    @method('put')
  
    {{-- Title  --}}
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="title" value="{{ old('title', $ticket->title) }}">
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
  
  
      {{-- Description  --}}
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control">
          {{ old('description', $ticket->description) }}
        </textarea>
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
  
      {{-- Label  --}}
      <div class="mb-3">
        <h5>Label</h5>
        @foreach ($labels as $label)
                  <input type="checkbox" value="{{ $label->id }}" name="label_id[]" 
                          {{ $ticket->labels->contains($label->id) ? 'checked' : '' }}>
          <label for="exampleInputPassword1" class="form-label">
            {{ $label->name }}
          </label>
        @endforeach
      </select>
      @error('category')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>
  
      {{-- Category --}}
      <div class="mb-3">
        <h5>Category</h5>
          @foreach ($categories as $category)
            <input type="checkbox" value="{{ $category->id }}" name="category_id[]" 
                    {{ $ticket->categories->contains($category->id) ? 'checked' : '' }}>
            <label for="exampleInputPassword1"   class="form-label">{{ $category->name }}</label>
          @endforeach
        </select>
        @error('category')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
  
      {{-- Priority --}}
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Priority</label>
  
        <select class="form-select form-control" aria-label="Default select example" name="priority">
          <option value="0" {{ $ticket->priority == 0 ? "selected" : ""}}>Normal</option>
          <option value="1" {{ $ticket->priority == 1 ? "selected" : ""}}>Height</option>
        </select>
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
  
      {{-- status --}}

      <div class="mb-3">
        <h5 for="exampleInputPassword1" class="form-label">Status</h5>
        <input type="radio" name="status" value="0" {{ $ticket->status == 0 ? "checked" : "" }}> <label class="form-label">Close</label>
        <input type="radio" name="status" value="1" {{ $ticket->status == 1 ? "checked" : "" }}> <label class="form-label">Open</label>
        @error('name')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      {{-- assign agent --}}

      <select name="agent_id" class="form-select">
        @foreach ($users as $user)
          <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select>

      {{-- file upload --}}
  
      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
        <input class="form-control" name="file[]" type="file" id="formFileMultiple" multiple>
      </div>
      <div>
          <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
@endsection
