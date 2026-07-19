@extends('layouts.app')

@section('title', 'Payment Failed - ' . config('app.name'))

@section('content')
<div class="text-center py-5">
    <i class="bi bi-x-circle-fill text-danger" style="font-size:5rem;"></i>
    <h2 class="mt-3">Payment Not Completed</h2>
    <p class="text-muted">
        Your order <strong>{{ $order->order_number }}</strong> was not paid.
        Status: <span class="badge bg-danger">{{ ucfirst($order->payment_status) }}</span>
    </p>
    <a href="{{ route('checkout.index') }}" class="btn btn-primary mt-3">Try Again</a>
    <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-3">Back to Home</a>
</div>
@endsection
