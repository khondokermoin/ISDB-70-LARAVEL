<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\SslCommerzService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);

        return view('checkout.index', compact('cart', 'total'));
    }

    public function placeOrder(Request $request, SslCommerzService $sslCommerz): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $validated = $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:500',
            'city'     => 'nullable|string|max:100',
            'postcode' => 'nullable|string|max:20',
            'payment_method' => 'required|in:sslcommerz,cod',
        ]);

        $total = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);

        $order = DB::transaction(function () use ($validated, $cart, $total) {
            $order = Order::create([
                'order_number'      => Order::generateOrderNumber(),
                'customer_name'     => $validated['customer_name'],
                'customer_email'    => $validated['customer_email'],
                'customer_phone'    => $validated['customer_phone'],
                'shipping_address'  => $validated['shipping_address'],
                'city'              => $validated['city'] ?? null,
                'postcode'          => $validated['postcode'] ?? null,
                'country'           => 'Bangladesh',
                'total_amount'      => $total,
                'payment_method'    => $validated['payment_method'],
                'payment_status'    => $validated['payment_method'] === 'cod' ? 'pending' : 'pending',
                'order_status'      => 'processing',
                'tran_id'           => 'TXN-' . strtoupper(uniqid()),
            ]);

            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_id'   => $productId,
                    'product_name' => $item['name'],
                    'price'        => $item['price'],
                    'quantity'     => $item['quantity'],
                    'subtotal'     => $item['price'] * $item['quantity'],
                ]);
            }

            return $order;
        });

        // Cash on Delivery: skip the payment gateway entirely.
        if ($order->payment_method === 'cod') {
            session()->forget('cart');
            return redirect()->route('checkout.success', $order->order_number)
                ->with('success', 'Order placed successfully! Pay on delivery.');
        }

        // SSLCommerz: initiate a sandbox payment session and redirect to the gateway.
        $result = $sslCommerz->initiatePayment($order);

        if (! $result['success']) {
            $order->update(['payment_status' => 'failed']);
            return redirect()->route('checkout.index')
                ->with('error', 'Payment initiation failed: ' . ($result['message'] ?? 'Unknown error'));
        }

        // Do NOT clear the cart yet — only clear it once payment is confirmed
        // in SslCommerzController@success, in case the customer abandons payment.
        return redirect()->away($result['gateway_url']);
    }

    public function success(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        return view('checkout.success', compact('order'));
    }
}
