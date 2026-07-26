<?php

namespace App\Models;

use App\Models\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasCompanyScope;

    protected $fillable = ['company_id', 'name', 'phone', 'email', 'is_walk_in'];

    protected $casts = [
        'is_walk_in' => 'boolean',
    ];
}
