@extends('layouts.app')

@section('content')
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-5"><img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->image }}"
                    class="img-fluid">
             </div>
            <div class="col-md-5 border border-2">
                <h1 class="display-5 fw-bolder">{{ $item->name }}</h1>
                <div class="fs-5 mb-5">
                    <span>${{ $item->price }}</span>
                </div>
                <p class="lead">{{ $item->quality }}</p>
                <div class="d-flex">
                    <form action="{{ route('carts.store', $item->id) }}" method="post" class="row">
                        @csrf
                        <div class="col-4">
                            <input class="form-control me-3 mt-2 shadow-none" name="number" id="number" type="number"
                                style="max-width: 5rem" spellcheck="false" data-ms-editor="true">
                        </div>
                        <div class="col-8">
                            <button class="btn btn-outline-dark flex-shrink-0 mt-2 mb-3" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
