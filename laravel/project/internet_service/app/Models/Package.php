<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $primaryKey = 'package_id';
    public    $timestamps = false;           // no created_at / updated_at in schema

    protected $fillable = [
        'name',
        'type',
        'features',
        'speed_mbps',
        'quota_gb',
        'price',
        'duration_days',
        'status'
    ];

    // Fix: proper casts matching actual column types
    protected $casts = [
        'speed_mbps'    => 'float',
        'quota_gb'      => 'integer',   // nullable int — cast handles null safely
        'price'         => 'decimal:2',
        'duration_days' => 'integer',
    ];

    // ========================================
    // Accessors — computed display values
    // Blade uses: $package->quota_display etc.
    // ========================================

    // Fix: catches BOTH 9999 (home) and NULL (corporate)
    public function getQuotaDisplayAttribute(): string
    {
        return (is_null($this->quota_gb) || $this->quota_gb >= 9999)
            ? 'Unlimited Data'
            : $this->quota_gb . ' GB';
    }

    // speed_mbps = 0 → ENTERPRISE (custom)
    public function getSpeedDisplayAttribute(): string
    {
        return ($this->speed_mbps == 0)
            ? 'Custom'
            : $this->speed_mbps . ' Mbps';
    }

    // price = 0 → ENTERPRISE (negotiable)
    public function getPriceDisplayAttribute(): string
    {
        return ($this->price == 0)
            ? 'Negotiable'
            : number_format($this->price);
    }

    // ========================================
    // Scopes — reusable query filters
    // ========================================
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeHomePackages($query)
    {
        return $query->where('type', 'home');
    }

    public function scopeCorporatePackages($query)
    {
        return $query->where('type', 'corporate');
    }
}
