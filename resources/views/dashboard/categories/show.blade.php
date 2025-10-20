@extends('layouts.dashboard')

@section('title', $category->name)

@section('breadcrumb')
    @parent
    <i class="breadcrumb-item active">Categories</i>
    <i class="breadcrumb-item active">{{ $category->name }}</i>
@endsection

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Store</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @php
                $products = $category->products()->with('store')->paginate(5);
            @endphp
            @forelse($products as $product)
                <tr>
                    <td><img src="{{ asset('storage/' . $product->image) }}" alt="#" height="50" width="50"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="5"> No Products Defined!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
