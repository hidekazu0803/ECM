@extends('layouts.app')

@section('title', 'admin: item')

@section('content')
    <table class=" table table-hover table-bordered  w-75 mx-auto ">
        <thead class="small table-success text-primary">
            <th></th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>QUALITY</th>
            <th class="text-center">EDIT</th>
        </thead>
        <tbody>
            @foreach ($all_items as $item)
                <tr>
                    <td>
                        @if ($item->image)
                            <img src="{{ asset('/storage/images/' . $item->image) }}"
                                class="rounded-circle d-block mx-auto admin-users-avatar" style="width: 1rem;
                                height: 1rem;
                                object-fit: cover;" alt="#">
                        @else
                            <i class=" fa-solid fa-circle-user d-block text-center admin-users-icon">
                            </i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('item.show', $item->id) }}"
                            class="text-decoration-none text-dark fw-bold">{{ $item->name }}
                        </a>
                    </td>
                    <td>
                        {{ $item->price }}
                    </td>
                    <td>{{ $item->quality }}</td>
                    <td class="text-center">
                        <!-- Button trigger modal -->


                            <a href="{{ route('admin.item.edit', $item->id) }}" class="text-decoration-none btn btn-sm btn-primary px-2">
                                <i class="fa-solid fa-pen"></i>Edit
                            </a>

                            <form action="{{ route('admin.item.delete', $item->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>

                            </form>


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
