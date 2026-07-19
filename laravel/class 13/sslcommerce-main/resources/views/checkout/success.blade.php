@extends('layouts.app')

@section('title', 'Order Confirmed - ' . config('app.name'))

@section('content')
<div class="text-center py-5">
    <i class="bi bi-check-circle-fill text-success" style="font-size:5rem;"></i>
    <h2 class="mt-3">Thank you, {{ $order->customer_name }}!</h2>
    <p class="text-muted">Your order has been placed successfully.</p>

    <div class="card border-0 shadow-sm mx-auto mt-4" style="max-width:500px;">
        <div class="card-body text-start">
            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
            <p><strong>Payment Method:</strong> {{ strtoupper($order->payment_method) }}</p>
            <p>
                <strong>Payment Status:</strong>
                @if($order->payment_status === 'paid')
                    <span class="badge bg-success">Paid</span>
                @else
                    <span class="badge bg-warning text-dark">{{ ucfirst($order->payment_status) }}</span>
                @endif
            </p>
            @if($order->bank_tran_id)
                <p><strong>Bank Transaction ID:</strong> {{ $order->bank_tran_id }}</p>
            @endif
            <p><strong>Total:</strong> ৳{{ number_format($order->total_amount, 2) }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-primary mt-4">Continue Shopping</a>
</div>
@endsection
