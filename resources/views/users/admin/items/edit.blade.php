@extends('layouts.app')

@section('title', 'Admin: edit item')

@section('content')
<form action="{{ route('admin.item.update', $item->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class=" row mb-3">
        <div class="col-6">
            <img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->image }}" class="img-thumbnail w-100">
            <input type="file" name="image" class="form-control mt-1 shadow-none">
            @error('image')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="mb-3">
        <label for="" class="form-label fw-bold">Name</label>
        <input type="text" name="name" id="name" class="form-control w-50" value="{{ old('name', $item->name) }}">
        @error('name')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label fw-bold">Price</label>
        <input type="number" name="price" id="price" class="form-control w-50" value="{{ old('price', $item->price) }}">
        @error('price')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label fw-bold">quality</label>
        <input type="text" name="quality" id="quality" class="form-control w-50" value="{{ old('quality', $item->quality) }}">
        @error('quality')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="btn btn-warning px-5">Save</button>
</form>
@endsection
