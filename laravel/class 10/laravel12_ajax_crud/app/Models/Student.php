<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];
}
