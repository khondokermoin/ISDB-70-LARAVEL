<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Mail\NewSubscriptionAdminNotification;
use App\Mail\SubscriptionConfirmationMail;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    /**
     * Company-এর current subscription dashboard দেখাবে।
     */
    public function index()
    {
        $company = Auth::user()->company;

        $subscription = Subscription::with('plan')
            ->where('company_id', $company->id)
            ->latest()
            ->first();

        $transactions = Transaction::where('company_id', $company->id)
            ->with('subscription')
            ->latest()
            ->take(10)
            ->get();

        $plans = Plan::active()->orderBy('price', 'asc')->get();

        return view('company.subscription.index', compact('subscription', 'transactions', 'plans', 'company'));
    }

    public function showPlans()
    {
        return $this->index();
    }

    public function subscribe(Request $request, Plan $plan)
    {
        $company      = Auth::user()->company;
        $transactionId = 'TXN-' . strtoupper(Str::random(12));
        $billingCycle  = $request->input('billing_cycle', $plan->billing_cycle ?? 'monthly');

        // Step 1: Pending transaction record তৈরি করো (payment শুরুর আগেই)
        Transaction::create([
            'company_id'     => $company->id,
            'amount'         => $plan->price,
            'currency'       => 'BDT',
            'payment_method' => 'sslcommerz',
            'transaction_id' => $transactionId,
            'status'         => 'pending',
            'details'        => ['plan_id' => $plan->id, 'billing_cycle' => $billingCycle],
        ]);

        // Step 2: SSLCommerz Hosted Checkout URL তৈরি করো
        // SSLCommerz sandbox base URL
        $isSandbox  = config('sslcommerz.is_sandbox', true);
        $storeId    = config('sslcommerz.store_id', env('SSLCOMMERZ_STORE_ID'));
        $storePass  = config('sslcommerz.store_password', env('SSLCOMMERZ_STORE_PASSWORD'));

        $successUrl = route('company.subscription.payment.callback', ['status' => 'success', 'tran_id' => $transactionId, 'plan_id' => $plan->id]);
        $failUrl    = route('company.subscription.payment.callback', ['status' => 'failed',  'tran_id' => $transactionId]);
        $cancelUrl  = route('company.subscription.payment.callback', ['status' => 'cancelled', 'tran_id' => $transactionId]);

        $postData = [
            'store_id'         => $storeId,
            'store_passwd'     => $storePass,
            'total_amount'     => $plan->price,
            'currency'         => 'BDT',
            'tran_id'          => $transactionId,
            'success_url'      => $successUrl,
            'fail_url'         => $failUrl,
            'cancel_url'       => $cancelUrl,
            'ipn_url'          => $successUrl,
            'shipping_method'  => 'No',
            'product_name'     => $plan->name . ' Subscription',
            'product_category' => 'SaaS',
            'product_profile'  => 'non-physical-goods',
            'cus_name'         => $company->name,
            'cus_email'        => $company->email,
            'cus_add1'         => $company->address ?? 'Dhaka',
            'cus_city'         => $company->city    ?? 'Dhaka',
            'cus_country'      => $company->country ?? 'Bangladesh',
            'cus_phone'        => $company->phone   ?? '01700000000',
        ];

        // Step 3: SSLCommerz API কে POST করে GatewayPageURL নাও
        $sslczURL = $isSandbox
            ? 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php'
            : 'https://securepay.sslcommerz.com/gwprocess/v4/api.php';

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $sslczURL);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); // sandbox এর জন্য
        $content = curl_exec($handle);
        curl_close($handle);

        $response = json_decode($content, true);

        // Step 4: GatewayPageURL পেলে redirect করো, না পেলে error দেখাও
        if (isset($response['GatewayPageURL']) && $response['GatewayPageURL']) {
            return redirect()->away($response['GatewayPageURL']);
        }

        // Gateway connection fail হলে pending transaction delete করো এবং error দেখাও
        Transaction::where('transaction_id', $transactionId)->delete();

        return redirect()->route('company.subscription.index')
            ->with('error', 'Payment gateway connection failed. Please try again later. (Error: ' . ($response['failedreason'] ?? 'Unknown') . ')');
    }

    public function downloadInvoice(string $invoiceNumber)
    {
        $company = Auth::user()->company;
        $path = storage_path('app/invoices/' . $invoiceNumber . '.pdf');

        $subscription = Subscription::where('company_id', $company->id)
            ->where('invoice_number', $invoiceNumber)
            ->firstOrFail();

        if (! file_exists($path)) {
            return back()->with('error', 'Invoice file not found.');
        }

        return response()->download($path, 'Invoice-' . $invoiceNumber . '.pdf');
    }

    public function paymentCallback(Request $request)
    {
        $status = $request->status;
        $transactionId = $request->tran_id;
        $planId = $request->plan_id;

        $transaction = Transaction::where('transaction_id', $transactionId)->first();

        if (!$transaction) {
            return redirect()->route('company.subscription.index')->with('error', 'Transaction not found.');
        }

        if ($status === 'success') {
            $company = $transaction->company;
            $plan = Plan::findOrFail($planId);

            $billingCycle = $transaction->details['billing_cycle'] ?? 'monthly';
            $endsAt = match ($billingCycle) {
                'yearly' => now()->addYear(),
                'lifetime' => null,
                default => now()->addMonth(),
            };

            $subscription = Subscription::updateOrCreate(
                ['company_id' => $company->id],
                [
                    'plan_id' => $plan->id,
                    'status' => 'active',
                    'billing_cycle' => $billingCycle,
                    'started_at' => now(),
                    'ends_at' => $endsAt,
                    'payment_gateway' => 'sslcommerz',
                    'transaction_id' => $transactionId,
                    'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
                ]
            );

            $company->update(['plan_id' => $plan->id, 'status' => 'active']);
            $transaction->update([
                'status' => 'success',
                'subscription_id' => $subscription->id,
            ]);

            $pdf = Pdf::loadView('pdf.subscription-invoice', [
                'company' => $company,
                'subscription' => $subscription,
                'plan' => $plan,
                'transaction' => $transaction,
            ]);

            // Storage-relative path ব্যবহার করা হচ্ছে (Queue serialization safe)
            $invoiceFileName = 'invoices/' . $subscription->invoice_number . '.pdf';
            Storage::disk('local')->put($invoiceFileName, $pdf->output());

            if ($company->email) {
                Mail::to($company->email)->queue(
                    new SubscriptionConfirmationMail($company, $subscription, $plan, $transaction, $invoiceFileName)
                );
            }

            // config() নয়, env() দিয়ে নেওয়া হচ্ছে — mail config এ super_admin_email key নেই
            $superAdminEmail = env('SUPER_ADMIN_EMAIL');
            if ($superAdminEmail) {
                Mail::to($superAdminEmail)->queue(
                    new NewSubscriptionAdminNotification($company, $subscription, $plan, $transaction)
                );
            }

            return redirect()->route('company.subscription.index')->with('success', '🎉 Payment successful! Your ' . $plan->name . ' subscription is now active.');
        }

        if ($status === 'failed') {
            $transaction->update(['status' => 'failed']);
            return redirect()->route('company.subscription.index')->with('error', 'Payment failed. Please try again.');
        }

        $transaction->update(['status' => 'pending']);
        return redirect()->route('company.subscription.index')->with('warning', 'Payment was cancelled.');
    }
}
