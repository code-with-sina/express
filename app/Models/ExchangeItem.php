<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'item',
        'percntage',
        'active',
        'image_path'
    ];
}
