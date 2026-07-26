<?php

namespace App\Models;

use App\Models\Traits\HasCompanyScope;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasCompanyScope;
}
