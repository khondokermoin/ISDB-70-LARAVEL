<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $guarded = []; // সব কলাম ফিলাবল করা হলো

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}