@extends('layouts.app')

@section('title', 'Checkout - ' . config('app.name'))

@section('content')
<h3 class="mb-4"><i class="bi bi-bag-check"></i> Checkout</h3>

<div class="row g-4">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Shipping Information</h5>
                <form action="{{ route('checkout.place') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name') }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="customer_email" class="form-control" value="{{ old('customer_email') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="customer_phone" class="form-control" value="{{ old('customer_phone') }}" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Shipping Address</label>
                        <textarea name="shipping_address" class="form-control" rows="2" required>{{ old('shipping_address') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city', 'Dhaka') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Postcode</label>
                            <input type="text" name="postcode" class="form-control" value="{{ old('postcode') }}">
                        </div>
                    </div>

                    <h5 class="mt-4 mb-3">Payment Method</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="pm_sslcommerz" value="sslcommerz" checked>
                        <label class="form-check-label" for="pm_sslcommerz">
                            <i class="bi bi-credit-card"></i> Pay Online (SSLCommerz — Card / Mobile Banking / Net Banking)
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="payment_method" id="pm_cod" value="cod">
                        <label class="form-check-label" for="pm_cod">
                            <i class="bi bi-cash"></i> Cash on Delivery
                        </label>
                    </div>

                    <div class="alert alert-warning small">
                        <i class="bi bi-info-circle"></i> This store uses the SSLCommerz <strong>sandbox</strong> environment.
                        On the payment page, use test card <code>4111111111111111</code>, any future expiry, and any CVC —
                        or pick a test Mobile Banking option. No real money is charged.
                    </div>

                    <button type="submit" class="btn btn-success btn-lg w-100">Place Order</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">Order Summary</h5>
                @foreach($cart as $item)
                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ $item['name'] }} &times; {{ $item['quantity'] }}</span>
                        <span>৳{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                    </div>
                @endforeach
                <hr>
                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Total</span>
                    <span>৳{{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
