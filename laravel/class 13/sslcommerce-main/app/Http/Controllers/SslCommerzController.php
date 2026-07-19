<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\SslCommerzService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SslCommerzController extends Controller
{
    /**
     * SSLCommerz redirects the customer's browser here (POST) after a
     * successful payment. We NEVER trust this alone — we re-validate the
     * val_id against SSLCommerz's server-side Validation API before marking
     * the order as paid.
     */
    public function success(Request $request, SslCommerzService $sslCommerz)
    {
        $tranId = $request->input('tran_id');
        $valId  = $request->input('val_id');

        $order = Order::where('tran_id', $tranId)->first();

        if (! $order) {
            return redirect()->route('home')->with('error', 'Order not found for this transaction.');
        }

        $validation = $sslCommerz->validateTransaction($valId);

        if ($validation['valid']) {
            $order->update([
                'payment_status'   => 'paid',
                'order_status'     => 'confirmed',
                'val_id'           => $valId,
                'bank_tran_id'     => $validation['data']['bank_tran_id'] ?? null,
                'card_type'        => $validation['data']['card_type'] ?? null,
                'gateway_response' => $validation['data'],
            ]);

            session()->forget('cart');

            return redirect()->route('checkout.success', $order->order_number)
                ->with('success', 'Payment successful! Your order is confirmed.');
        }

        $order->update([
            'payment_status'   => 'failed',
            'gateway_response' => $validation['data'],
        ]);

        return redirect()->route('payment.fail.page', $order->order_number)
            ->with('error', 'Payment could not be verified. Please try again.');
    }

    /**
     * SSLCommerz redirects here (POST) when a payment attempt fails.
     */
    public function fail(Request $request)
    {
        $tranId = $request->input('tran_id');
        $order = Order::where('tran_id', $tranId)->first();

        if ($order) {
            $order->update([
                'payment_status'   => 'failed',
                'gateway_response' => $request->all(),
            ]);
            return redirect()->route('payment.fail.page', $order->order_number);
        }

        return redirect()->route('home')->with('error', 'Payment failed.');
    }

    /**
     * SSLCommerz redirects here (POST) when the customer cancels payment.
     */
    public function cancel(Request $request)
    {
        $tranId = $request->input('tran_id');
        $order = Order::where('tran_id', $tranId)->first();

        if ($order) {
            $order->update([
                'payment_status'   => 'cancelled',
                'gateway_response' => $request->all(),
            ]);
            return redirect()->route('payment.fail.page', $order->order_number)
                ->with('error', 'Payment was cancelled.');
        }

        return redirect()->route('home')->with('error', 'Payment cancelled.');
    }

    /**
     * IPN (Instant Payment Notification) — SSLCommerz calls this server-to-server
     * independently of the browser redirect, so it works even if the customer
     * closes their browser mid-flow. Always validate before trusting it.
     */
    public function ipn(Request $request, SslCommerzService $sslCommerz)
    {
        Log::info('SSLCommerz IPN received', $request->all());

        $tranId = $request->input('tran_id');
        $valId  = $request->input('val_id');

        $order = Order::where('tran_id', $tranId)->first();

        if (! $order) {
            return response('Order not found', 404);
        }

        $validation = $sslCommerz->validateTransaction($valId);

        if ($validation['valid'] && $order->payment_status !== 'paid') {
            $order->update([
                'payment_status'   => 'paid',
                'order_status'     => 'confirmed',
                'val_id'           => $valId,
                'bank_tran_id'     => $validation['data']['bank_tran_id'] ?? null,
                'card_type'        => $validation['data']['card_type'] ?? null,
                'gateway_response' => $validation['data'],
            ]);
        }

        return response('IPN received', 200);
    }

    public function failPage(string $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        return view('payment.fail', compact('order'));
    }
}
