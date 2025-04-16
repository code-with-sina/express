<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpressTransactionChat extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id',
        'user_id',
        'message',
        'sender_id',
        'receiver_id'
    ];
}
