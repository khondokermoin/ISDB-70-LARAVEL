@extends('layouts.admin_master')

@section('title', 'Payment Gateways - Global Settings')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Payment Gateways</h2>
                <div class="mt-1 text-muted">Configure your SaaS platform's payment methods and API credentials.</div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('superadmin.settings.payment.update') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="group" value="payment">

                    <div class="mb-4 card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="ti ti-credit-card me-2"></i> Stripe Configuration</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Enable Stripe -->
                                <div class="col-md-12">
                                    <label class="form-check form-switch">
                                        <!-- Hidden input ensures '0' is sent if unchecked -->
                                        <input type="hidden" name="stripe_enabled" value="0">
                                        <input class="form-check-input" type="checkbox" name="stripe_enabled" value="1"
                                            {{ old('stripe_enabled', $settings['stripe_enabled'] ?? '0') == '1' ? 'checked' : '' }}>
                                        <span class="form-check-label">Enable Stripe Payment Gateway</span>
                                    </label>
                                </div>

                                <!-- Publishable Key -->
                                <div class="col-md-6">
                                    <label class="form-label">Stripe Publishable Key</label>
                                    <input type="text" name="stripe_publishable_key" class="form-control @error('stripe_publishable_key') is-invalid @enderror"
                                        value="{{ old('stripe_publishable_key', $settings['stripe_publishable_key'] ?? '') }}" placeholder="pk_test_...">
                                    @error('stripe_publishable_key') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Secret Key -->
                                <div class="col-md-6">
                                    <label class2="form-label">Stripe Secret Key</label>
                                    <input type="password" name="stripe_secret_key" class="form-control @error('stripe_secret_key') is-invalid @enderror"
                                        value="{{ old('stripe_secret_key', $settings['stripe_secret_key'] ?? '') }}" placeholder="sk_test_...">
                                    @error('stripe_secret_key') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="ti ti-brand-paypal me-2"></i> PayPal Configuration</h3>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Enable PayPal -->
                                <div class="col-md-12">
                                    <label class="form-check form-switch">
                                        <input type="hidden" name="paypal_enabled" value="0">
                                        <input class="form-check-input" type="checkbox" name="paypal_enabled" value="1"
                                            {{ old('paypal_enabled', $settings['paypal_enabled'] ?? '0') == '1' ? 'checked' : '' }}>
                                        <span class="form-check-label">Enable PayPal Payment Gateway</span>
                                    </label>
                                </div>

                                <!-- Client ID -->
                                <div class="col-md-6">
                                    <label class="form-label">PayPal Client ID</label>
                                    <input type="text" name="paypal_client_id" class="form-control @error('paypal_client_id') is-invalid @enderror"
                                        value="{{ old('paypal_client_id', $settings['paypal_client_id'] ?? '') }}">
                                    @error('paypal_client_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <!-- Secret -->
                                <div class="col-md-6">
                                    <label class="form-label">PayPal Secret</label>
                                    <input type="password" name="paypal_secret" class="form-control @error('paypal_secret') is-invalid @enderror"
                                        value="{{ old('paypal_secret', $settings['paypal_secret'] ?? '') }}">
                                    @error('paypal_secret') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Save Payment Settings
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
