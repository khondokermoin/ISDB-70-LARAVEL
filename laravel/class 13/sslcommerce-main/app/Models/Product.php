<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'description',
        'price', 'discount_price', 'stock', 'image', 'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function finalPrice(): float
    {
        return (float) ($this->discount_price ?? $this->price);
    }

    public function imageUrl(): string
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : 'https://placehold.co/500x500?text=' . urlencode($this->name);
    }
}
