<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'trial_days',
        'user_limit',
        'branch_limit',
        'features',
        'status',      
        'is_active',   
    ];

    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    /**
     * ✅ Inactive প্ল্যানগুলো আনার জন্য Scope
     */
    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', 'inactive');
    }

    /**
     * প্ল্যানটি Active কিনা চেক করার জন্য
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * প্ল্যানটি Inactive কিনা চেক করার জন্য
     */
    public function isInactive(): bool
    {
        return $this->status === 'inactive';
    }

    /**
     * প্ল্যানটি Draft কিনা চেক করার জন্য
     */
    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }

    /**
     * Subscriptions এর সাথে Relationship
     */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Companies এর সাথে Relationship (যদি প্রয়োজন হয়)
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}