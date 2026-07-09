<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'logo', 
        'subdomain', 'status', 'trial_ends_at', 'user_id'
    ];

    protected $casts = [
        'trial_ends_at' => 'datetime',
    ];

    // Company Admin (যে ইউজার এই কোম্পানির মালিক)
    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // কোম্পানির সাবস্ক্রিপশন
    public function subscription()
    {
        return $this->hasOne(Subscription::class)->latest();
    }

    // কোম্পানির সব পেমেন্ট হিস্টরি
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}