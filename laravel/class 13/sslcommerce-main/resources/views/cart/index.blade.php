@extends('layouts.app')

@section('title', 'Your Cart - ' . config('app.name'))

@section('content')
<h3 class="mb-4"><i class="bi bi-cart3"></i> Your Cart</h3>

@if(empty($cart))
    <div class="alert alert-info">
        Your cart is empty. <a href="{{ route('products.index') }}">Continue shopping</a>.
    </div>
@else
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cart as $productId => $item)
                    @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                    <tr>
                        <td class="d-flex align-items-center gap-2">
                            <img src="{{ $item['image'] }}" width="50" height="50" style="object-fit:cover;" class="rounded">
                            {{ $item['name'] }}
                        </td>
                        <td>৳{{ number_format($item['price'], 2) }}</td>
                        <td style="width:120px;">
                            <form action="{{ route('cart.update', $productId) }}" method="POST" class="d-flex">
                                @csrf @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm">
                                <button class="btn btn-sm btn-outline-secondary ms-1"><i class="bi bi-arrow-repeat"></i></button>
                            </form>
                        </td>
                        <td>৳{{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $productId) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <div class="card border-0 shadow-sm" style="width: 300px;">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold">৳{{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('checkout.index') }}" class="btn btn-success w-100">Proceed to Checkout</a>
            </div>
        </div>
    </div>
@endif
@endsection
