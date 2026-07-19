<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number', 'customer_name', 'customer_email', 'customer_phone',
        'shipping_address', 'city', 'postcode', 'country', 'total_amount',
        'payment_method', 'payment_status', 'order_status',
        'tran_id', 'val_id', 'bank_tran_id', 'card_type', 'gateway_response',
    ];

    protected $casts = [
        'gateway_response' => 'array',
        'total_amount' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber(): string
    {
        return 'ORD-' . now()->format('Ymd') . '-' . strtoupper(uniqid());
    }
}
