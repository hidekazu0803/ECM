@extends('layouts.app')

@section('title', 'cart')

@section('content')
    <table class=" table table-hover table-bordered  w-75 mx-auto ">
        <thead class="small table-success text-secondary">
            <th></th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>QUALITY</th>
            <th>NUMBER</th>
            <th class="text-center">STATUS</th>
        </thead>
        <tbody>
            @foreach ($all_carts as $cart)
                <tr>
                    <td>
                        @if ($cart->item->image)
                            <img src="{{ asset('/storage/images/' . $cart->item->image) }}"
                                class="rounded-circle d-block mx-auto admin-users-avatar" style="width: 1rem;
                                height: 1rem;
                                object-fit: cover;" alt="">
                        @else
                            <i class=" fa-solid fa-circle-user d-block text-center admin-users-icon">
                            </i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('item.show', $cart->item->id) }}"
                            class="text-decoration-none text-dark fw-bold">{{ $cart->item->name }}</a>
                    </td>
                    <td>
                        {{ $cart->item->price }}
                    </td>
                    <td>{{ $cart->item->quality }}</td>
                    <td>{{ $cart->number }}</td>
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        @if ($cart->status == 'purchase')
                            <button type="button" class="btn btn-sm btn-outline-primary">
                                <i class="fa-solid fa-check"></i> Purchased
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-item-{{ $cart->item->id }}">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#purchase-item-{{ $cart->item->id }}">
                                <i class="fa-solid fa-check"></i> Purchase
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-item-{{ $cart->item->id }}">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        @endif

                        @include('users.carts.status')

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
