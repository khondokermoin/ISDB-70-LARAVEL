<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->default('Bangladesh');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_method', ['sslcommerz', 'cod'])->default('sslcommerz');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'cancelled', 'refunded'])->default('pending');
            $table->enum('order_status', ['processing', 'confirmed', 'shipped', 'delivered', 'cancelled'])->default('processing');

            // SSLCommerz specific tracking fields
            $table->string('tran_id')->unique()->nullable();
            $table->string('val_id')->nullable();
            $table->string('bank_tran_id')->nullable();
            $table->string('card_type')->nullable();
            $table->json('gateway_response')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
