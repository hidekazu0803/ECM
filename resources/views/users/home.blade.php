@extends('layouts.app')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 my-5 ">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">shop in style</h1>
                <p class="text-muted Lead mb-0">all you want to buy.</p>
            </div>
        </div>
    </header>
    <div class="py-5">
        <div class="container px-4 mt-5">
            <div class="row justify-content-center gx-4">
                {{-- foreach --}}
                @foreach ($all_items as $item)
                <div class="col-3 mb-5">

                    <div class="card h-100 border border-dark">

                        <a href="{{ route('item.show', $item->id) }}">
                            <img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->image }}" class="img-fluid"></a>

                        <div class="card-body py-4">
                            <div class="text-center">
                                <h1>{{ $item->name }}</h1>
                                <p>${{ $item->price }}</p>
                                <p>{{ $item->quality }}</p>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <form action="{{ route('carts.store', $item->id) }}" method="post">
                                    @csrf
                                    <input type="number" name="number" id="number" class="form-control mx-auto mb-3" style="max-width: 5rem">
                                    <button type="submit" class="btn btn-outline-dark mt-auto"> Add cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{-- endforeach --}}
            </div>
        </div>
    </div>
    <footer></footer>
@endsection
