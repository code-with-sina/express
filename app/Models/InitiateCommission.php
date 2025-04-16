<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitiateCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'from_uuid',
        'to_uuid',
        'status',
        'session'
    ];
}
