@php
    // Calculate dynamic total and cart items count
    $total = 0;
    $cartCount = 0;
    if(session('cart')) {
        foreach(session('cart') as $id => $details) {
            $total += $details['price'] * $details['quantity'];
            $cartCount++;
        }
    }
@endphp

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
      body {
        background-color: #f8f9fa;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    
<div class="container py-3">
  <main>
    <div class="py-5 text-center">
      <h2>Checkout</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success"> 
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger"> 
            {{ session('error') }}
        </div>
    @endif

    <div class="row g-5">
      <!-- CART SIDEBAR -->
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">{{ $cartCount }}</span>
        </h4>
        <ul class="list-group mb-3">
          
          <!-- Dynamic Cart Items -->
          @if(session('cart'))
              @foreach(session('cart') as $id => $details)
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                      <h6 class="my-0">{{ $details['name'] }}</h6>
                      <small class="text-muted">Qty: {{ $details['quantity'] }}</small>
                    </div>
                    <span class="text-muted">${{ $details['price'] * $details['quantity'] }}</span>
                  </li>
              @endforeach
          @endif
          
          <!-- Dynamic Total -->
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>${{ $total }}</strong>
          </li>
        </ul>

        <form class="card p-2" onsubmit="event.preventDefault();">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div>

      <!-- BILLING & PAYMENT FORM -->
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        
        <form class="needs-validation" id="checkout-form" method="POST" action="{{ route('stripe.post') }}" novalidate>
          @csrf
          <!-- Hidden Stripe Token Input -->
          <input type='hidden' name='stripeToken' id='stripe-token-id'>

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" name="first_name" id="firstName" required>
              <div class="invalid-feedback">Valid first name is required.</div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" name="last_name" id="lastName" required>
              <div class="invalid-feedback">Valid last name is required.</div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                <div class="invalid-feedback">Your username is required.</div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">Please enter your shipping address.</div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" name="country" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
                <option>Bangladesh</option>
              </select>
              <div class="invalid-feedback">Please select a valid country.</div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" name="state" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
                <option>Dhaka</option>
              </select>
              <div class="invalid-feedback">Please provide a valid state.</div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" name="zip" id="zip" required>
              <div class="invalid-feedback">Zip code required.</div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <!-- Payment Options -->
          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="payment_method" type="radio" value="stripe" class="form-check-input payment-method" checked required>
              <label class="form-check-label" for="credit">Stripe (Card Payment)</label>
            </div>
            <div class="form-check">
              <input id="debit" name="payment_method" type="radio" value="sslcommerz" class="form-check-input payment-method" required>
              <label class="form-check-label" for="debit">SSL Commerz (bKash, Nagad, Card)</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="payment_method" type="radio" value="cod" class="form-check-input payment-method" required>
              <label class="form-check-label" for="paypal">Cash on Delivery</label>
            </div>
          </div>

          <!-- STRIPE PAYMENT ELEMENT (Shows by default) -->
          <div id="stripe-fields" class="payment-box">
              <div class="row gy-3">
                <div class="col-md-12">
                  <label for="card-element" class="form-label">Credit or debit card details</label>
                  <div id="card-element" class="form-control py-2" style="height: 40px;">
                      <!-- Stripe Element injected here -->
                  </div>
                  <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                </div>
              </div>
          </div>

          <!-- SSL COMMERZ INFO (Hidden by default) -->
          <div id="ssl-fields" class="payment-box" style="display: none;">
              <div class="alert alert-info mt-2">
                  You will be redirected to the SSL Commerz secure gateway to complete your payment via bKash, Nagad, or Local Cards.
              </div>
          </div>

          <!-- CASH ON DELIVERY INFO (Hidden by default) -->
          <div id="cod-fields" class="payment-box" style="display: none;">
              <div class="alert alert-warning mt-2">
                  You have selected Cash on Delivery. You will pay the delivery man when you receive the product.
              </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg mb-5" id="submit-btn" type="submit">Pay ${{$total}} with Stripe</button>
        </form>
      </div>
    </div>
  </main>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
    // URL ROUTES
    const routeStripe = "{{ route('stripe.post') }}";
    const routeSSLCommerz = "{{ url('/pay') }}"; // Update with your SSL route
    const routeCOD = "{{ url('/cash-on-delivery') }}"; // Update with your COD route

    // 1. Setup Stripe
    var stripe = Stripe('{{ env('STRIPE_KEY') }}'); 
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    $(document).ready(function() {
        
        // 2. Handle Radio Button Toggling
        $('.payment-method').change(function() {
            let method = $(this).val();
            
            // Hide all payment boxes first
            $('.payment-box').slideUp();

            if (method === 'stripe') {
                $('#stripe-fields').slideDown();
                $('#checkout-form').attr('action', routeStripe);
                $('#submit-btn').text('Pay ${{$total}} with Stripe');
            } 
            else if (method === 'sslcommerz') {
                $('#ssl-fields').slideDown();
                $('#checkout-form').attr('action', routeSSLCommerz);
                $('#submit-btn').text('Proceed to SSL Commerz (${{$total}})');
            } 
            else if (method === 'cod') {
                $('#cod-fields').slideDown();
                $('#checkout-form').attr('action', routeCOD);
                $('#submit-btn').text('Confirm Order (Cash on Delivery)');
            }
        });

        // 3. Handle Form Submission & Validation
        $('#checkout-form').on('submit', function(event) {
            let form = this;
            let method = $('input[name="payment_method"]:checked').val();

            // HTML5 Form Validation
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                $(form).addClass('was-validated');
                return;
            }

            // Only intercept submission if method is Stripe
            if (method === 'stripe') {
                event.preventDefault(); // Stop normal submission
                $('#submit-btn').prop('disabled', true).text('Processing...');
                
                stripe.createToken(cardElement).then(function(result) {
                    if (result.error) {
                        $('#card-errors').text(result.error.message);
                        $('#submit-btn').prop('disabled', false).text('Pay ${{$total}} with Stripe');
                    } else {
                        $('#stripe-token-id').val(result.token.id);
                        form.submit(); // Native JS submit
                    }
                });
            }
            // For SSL and COD, it will automatically submit to their respective routes!
        });
    });
</script>
</body>
</html>