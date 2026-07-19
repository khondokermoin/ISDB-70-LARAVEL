@extends('layouts.app')

@section('title', 'Shop - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="fw-bold">Categories</h6>
                <ul class="list-unstyled">
                    <li class="mb-1"><a href="{{ route('products.index') }}" class="text-decoration-none {{ !request('category') ? 'fw-bold text-primary' : 'text-dark' }}">All Products</a></li>
                    @foreach($categories as $category)
                        <li class="mb-1">
                            <a href="{{ route('products.index', ['category' => $category->slug]) }}"
                               class="text-decoration-none {{ request('category') == $category->slug ? 'fw-bold text-primary' : 'text-dark' }}">
                                {{ $category->name }} <span class="text-muted">({{ $category->products_count }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">{{ $products->total() }} Products Found</h4>
        </div>

        @if($products->isEmpty())
            <div class="alert alert-info">No products found.</div>
        @else
            <div class="row g-4">
                @foreach($products as $product)
                    @include('products.partials.card', ['product' => $product])
                @endforeach
            </div>
            <div class="mt-4">{{ $products->links() }}</div>
        @endif
    </div>
</div>
@endsection
