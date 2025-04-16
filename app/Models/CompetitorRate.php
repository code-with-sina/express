<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitorRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'withdraw_in_fee',
        'conversion_fee',
        'service_fee'
    ];
}
