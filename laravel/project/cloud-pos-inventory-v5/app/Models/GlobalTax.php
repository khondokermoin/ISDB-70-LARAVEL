<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalTax extends Model
{
    protected $fillable = ['company_id', 'name', 'rate', 'is_active'];

    protected $casts = [
        'rate' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
