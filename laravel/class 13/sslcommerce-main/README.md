# CubeGenSoft Shop — Laravel 12 + Bootstrap 5 E-commerce with SSLCommerz Sandbox

A complete e-commerce storefront built on **Laravel 12** with a **Bootstrap 5** frontend, featuring
product catalog, session-based cart, checkout, and full **SSLCommerz sandbox** payment gateway
integration (session init, success/fail/cancel callbacks, server-side validation, and IPN).

---

## 1. Requirements

- PHP >= 8.2
- Composer
- MySQL (or any Laravel-supported DB)
- Node not required (Bootstrap/icons loaded via CDN — no build step needed)

## 2. Installation

> **Important:** This package contains the app-specific Laravel 12 code (models, controllers,
> migrations, views, routes, SSLCommerz service) but not the full framework skeleton
> (vendor/, artisan bootstrap internals, etc. — those come from Composer). Set it up like this:

```bash
# 0. Create a fresh Laravel 12 skeleton, then copy this package's files into it
composer create-project laravel/laravel temp-laravel-12
# Copy the contents of THIS package (app/, config/, database/, resources/, routes/, .env.example)
# into temp-laravel-12/, overwriting the matching files, then work from that folder.

# 1. Install PHP dependencies
composer install

# 2. Copy environment file
cp .env.example .env
php artisan key:generate

# 3. Configure your database in .env, then run migrations + seed sample data
php artisan migrate --seed

# 4. Link storage (for product image uploads via the admin panel)
php artisan storage:link

# 5. Serve the app
php artisan serve
```

Visit `http://localhost:8000`.

## 3. Getting SSLCommerz Sandbox Credentials

1. Register a free sandbox account at **https://developer.sslcommerz.com/registration/**
2. After registering, SSLCommerz emails you a sandbox **Store ID** and **Store Password**
   (or you can use the default public test credentials already filled into `.env.example`:
   `SSLCZ_STORE_ID=testbox`, `SSLCZ_STORE_PASSWORD=qwerty` — these work for basic testing,
   but registering your own sandbox store is recommended for reliable access).
3. Put your credentials in `.env`:

```env
SSLCZ_STORE_ID=your_store_id
SSLCZ_STORE_PASSWORD=your_store_password
SSLCZ_SANDBOX=true
```

No package/SDK is required — the integration talks to SSLCommerz's REST API directly via
Laravel's `Http` client. See `app/Services/SslCommerzService.php`.

## 4. How the Payment Flow Works

1. **Customer checks out** → `CheckoutController@placeOrder` creates an `Order` (status `pending`)
   with a unique `tran_id`.
2. **Session initiation** → `SslCommerzService::initiatePayment()` POSTs order + customer details
   to SSLCommerz's `/gwprocess/v4/api.php` sandbox endpoint and receives a `GatewayPageURL`.
3. **Redirect to gateway** → the customer is redirected to that URL to complete payment using
   SSLCommerz's sandbox test cards / mobile banking simulators.
4. **Callback** → SSLCommerz POSTs back to one of:
   - `/payment/success` → `SslCommerzController@success`
   - `/payment/fail` → `SslCommerzController@fail`
   - `/payment/cancel` → `SslCommerzController@cancel`
5. **Server-side validation** → on success, we **never trust the redirect alone**. We call
   SSLCommerz's Validation API (`/validator/api/validationserverAPI.php`) with the `val_id` to
   confirm the transaction is genuine before marking the order `paid`.
6. **IPN (Instant Payment Notification)** → `/payment/ipn` is a server-to-server webhook
   SSLCommerz also calls independently, so orders still get marked paid even if the customer
   closes their browser before the redirect completes. Configure this URL in your SSLCommerz
   panel under IPN settings if you want it enabled (works automatically in sandbox since we pass
   `ipn_url` in the session request too).

These four routes have CSRF protection disabled in `bootstrap/app.php` since SSLCommerz posts to
them from an external domain and cannot supply a Laravel CSRF token.

## 5. Testing Payments in Sandbox

On the SSLCommerz sandbox gateway page, use:
- **Test Card:** `4111111111111111`, any future expiry, any 3-digit CVC
- **Mobile Banking:** choose any of the simulated bKash/Nagad/Rocket options and follow the
  on-screen test flow (no real money moves in sandbox mode)

## 6. Project Structure

```
app/
  Models/            Product, Category, Order, OrderItem
  Http/Controllers/  Home, Product, Cart, Checkout, SslCommerzController, Admin/ProductController
  Services/          SslCommerzService.php  (the SSLCommerz integration)
config/sslcommerz.php   Store credentials + API endpoints
database/migrations/    categories, products, orders, order_items
resources/views/        Bootstrap 5 blade views (storefront, cart, checkout, admin)
routes/web.php          All routes incl. payment callback routes
```

## 7. Notes for Going to Production

- Set `SSLCZ_SANDBOX=false` and use your **live** SSLCommerz merchant credentials.
- Add authentication (Laravel Breeze/Fortify) in front of the `/admin` routes — this template
  ships them **without** auth middleware so you can wire up whatever auth system you prefer.
- Consider queuing IPN processing if you expect high order volume.
- Add proper stock decrement logic in `SslCommerzController@success`/`ipn` if you need
  real-time inventory management.

---
Built for Polok / CubeGenSoft.
