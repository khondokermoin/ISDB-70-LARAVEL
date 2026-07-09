<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'plan_id', 'status', 
        'started_at', 'ends_at', 'trial_ends_at'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ends_at' => 'datetime',
        'trial_ends_at' => 'datetime',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    // সাবস্ক্রিপশন অ্যাক্টিভ কিনা চেক করা
    public function isActive(): bool
    {
        return $this->status === 'active' && $this->ends_at?->isFuture();
    }
}