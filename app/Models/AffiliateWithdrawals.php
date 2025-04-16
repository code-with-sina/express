<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateWithdrawals extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'amount',
        'approval',
        'status'
    ];
}
