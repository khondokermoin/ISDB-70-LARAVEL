@extends('layouts.app')

@section('title', $product->name . ' - ' . config('app.name'))

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a></li>
        <li class="breadcrumb-item active">{{ $product->name }}</li>
    </ol>
</nav>

<div class="row g-4">
    <div class="col-md-5">
        <img src="{{ $product->imageUrl() }}" class="img-fluid rounded-4 shadow-sm" alt="{{ $product->name }}">
    </div>
    <div class="col-md-7">
        <h2>{{ $product->name }}</h2>
        <p class="text-muted">{{ $product->category->name }}</p>

        <div class="mb-3">
            @if($product->discount_price)
                <span class="text-decoration-line-through text-muted fs-5">৳{{ number_format($product->price, 2) }}</span>
                <span class="fw-bold text-danger fs-3 ms-2">৳{{ number_format($product->discount_price, 2) }}</span>
            @else
                <span class="fw-bold fs-3">৳{{ number_format($product->price, 2) }}</span>
            @endif
        </div>

        <p>{{ $product->description }}</p>

        <p>
            @if($product->stock > 0)
                <span class="badge bg-success">In Stock ({{ $product->stock }} available)</span>
            @else
                <span class="badge bg-danger">Out of Stock</span>
            @endif
        </p>

        @if($product->stock > 0)
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex gap-2 align-items-center">
                @csrf
                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="form-control" style="width:100px;">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
            </form>
        @endif
    </div>
</div>

@if($related->isNotEmpty())
    <h4 class="mt-5 mb-3">Related Products</h4>
    <div class="row g-4">
        @foreach($related as $item)
            @include('products.partials.card', ['product' => $item])
        @endforeach
    </div>
@endif
@endsection
