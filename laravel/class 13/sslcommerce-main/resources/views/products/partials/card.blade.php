<div class="col-6 col-md-4 col-lg-3">
    <div class="card h-100 shadow-sm border-0">
        <a href="{{ route('products.show', $product->slug) }}">
            <img src="{{ $product->imageUrl() }}" class="card-img-top" alt="{{ $product->name }}" style="height:200px;object-fit:cover;">
        </a>
        <div class="card-body d-flex flex-column">
            <h6 class="card-title">
                <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none text-dark">{{ $product->name }}</a>
            </h6>
            <div class="mt-auto">
                @if($product->discount_price)
                    <span class="text-decoration-line-through text-muted small">৳{{ number_format($product->price, 2) }}</span>
                    <span class="fw-bold text-danger">৳{{ number_format($product->discount_price, 2) }}</span>
                @else
                    <span class="fw-bold">৳{{ number_format($product->price, 2) }}</span>
                @endif
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm w-100">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
