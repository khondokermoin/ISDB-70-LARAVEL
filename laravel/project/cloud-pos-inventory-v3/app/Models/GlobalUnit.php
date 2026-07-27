<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalUnit extends Model
{
    protected $fillable = ['company_id', 'name', 'short_code', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
