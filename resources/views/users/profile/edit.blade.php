@extends('layouts.app')


@section('title', 'Edit Profile')

@section('content')


    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            @if (Auth::user()->avatar)
            <img src="{{ asset('storage/avatars/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}" class="img-thumbnail avatar d-block mx-auto">
            @else
            <i class="fa-solid fa-user fa-10x d-block"></i>
            @endif
            <input type="file" name="image" class="form-control mt-1 shadow-none">
            @error('avatar')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}">
            @error('name')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Email Address</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
            @error('email')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Contact Number</label>
            <input type="number" name="contact_number" class="form-control" value="{{ old('contact_number', Auth::user()->contact_number) }}">
            @error('contact_number')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label fw-bold">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', Auth::user()->address) }}">
            @error('address')
            <p class="text-danger small">{{ $message }}</p>
        @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm px-5">Save</button>
    </form>
@endsection
