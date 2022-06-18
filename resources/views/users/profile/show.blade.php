@extends('layouts.app')

@section('title', 'profile show')

@section('content')
<div class="row">
    <div class="col-4">
        @if (Auth::user()->avatar)
          <a href="#">
            <img src="{{ asset('storage/avatars/'.Auth::user()->avatar) }}" class="img-thumbnall rounded-circle d-block mx-auto profile-avatar" alt="" style="height:200px; width:200px">
          </a>
        @else
        <a href="#" class="text-decoration-none">
            <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
        </a>
        @endif
    </div>
    <div class="col-8">
            <div class="mb-3">
                <h2 class="display-6 d-inline"> {{Auth::user()->name }} </h2>
            </div>
            <div class="mb-3">
                {{ Auth::user()->email }}
            </div>
            <div class="mb-3">
                {{ Auth::user()->contact_number }}
            </div>
            <div class="mb-3">
                {{ Auth::user()->address }}
            </div>
            <div class="mb-3">
                <a href="{{ route('profile.edit', Auth::user()->id) }}">
                    Edit Profile
                </a>
            </div>
    </div>
</div>

<div class="row" style="margin-top:100px">
    <h2 class="display-6">History</h2>
    @foreach ($all_carts as $cart )
         <div class="col-4 mb-3">
             <a href="{{ route('item.show', $cart->item_id) }}">
                 <img src="{{ asset('storage/images/'.$cart->item->image) }}" class="img-fluid" alt="">
            </a>
         </div>
         <div class="col-8">
            <h1 class="display-5 fw-bolder">{{ $cart->item->name }}</h1>
            <div class="fs-5">
                <span>${{ $cart->item->price }}</span>
            </div>
            <p class="lead">{{ $cart->item->quality }}</p>
         </div>
    @endforeach

    </div>

@endsection
