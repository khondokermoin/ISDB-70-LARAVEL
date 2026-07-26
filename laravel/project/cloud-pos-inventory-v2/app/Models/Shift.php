<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Shift model representing cash drawer sessions
 */
class Shift extends Model
{
    use HasCompanyScope;

    protected $fillable = [
        'company_id',
        'branch_id',
        'opened_by',
        'opening_balance',
        'closing_balance',
        'status',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'opened_by');
    }
}
