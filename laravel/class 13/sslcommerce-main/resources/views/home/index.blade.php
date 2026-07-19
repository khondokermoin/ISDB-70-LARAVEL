@extends('layouts.app')

@section('title', 'Home - ' . config('app.name'))

@section('content')
<div class="p-5 mb-4 bg-primary text-white rounded-4">
    <h1 class="display-6 fw-bold">Welcome to {{ config('app.name') }}</h1>
    <p class="lead mb-0">Quality products, fast delivery, secure payment via SSLCommerz.</p>
    <a href="{{ route('products.index') }}" class="btn btn-light btn-lg mt-3">Shop Now</a>
</div>

<h3 class="mb-3">Shop by Category</h3>
<div class="row g-3 mb-5">
    @foreach($categories as $category)
        <div class="col-6 col-md-3">
            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="text-decoration-none">
                <div class="card h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-tag-fill fs-1 text-primary"></i>
                        <h6 class="card-title mt-2 text-dark">{{ $category->name }}</h6>
                        <small class="text-muted">{{ $category->products_count }} items</small>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<h3 class="mb-3">Featured Products</h3>
<div class="row g-4">
    @foreach($featuredProducts as $product)
        @include('products.partials.card', ['product' => $product])
    @endforeach
</div>
@endsection
