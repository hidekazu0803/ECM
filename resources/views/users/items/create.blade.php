@extends('layouts.app')

@section('title', 'Create Item')

@section('content')
<form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label fw-bold">Name</label>
            <input type="name" name="name" class="form-control" id="name">
            @error('name')
            <p class="text-danger small">{{ $message }}</p>
            @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label fw-bold">Price</label>
        <input type="number" name="price" class="form-control" id="price">
        @error('price')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="quality" class="form-label fw-bold">Quality</label>
        <textarea name="quality" id="quality" rows="3" class="form-control"
        placeholder="What quality is item?">{{old('quality')}}</textarea>
        @error('quality')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <input type="file" name="image" class="form-control" id="">
        @error('image')
        <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary px-5">Add</button>
</form>

@endsection
