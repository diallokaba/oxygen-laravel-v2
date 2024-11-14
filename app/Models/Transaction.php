<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'amount',
        'type',
        'status',
        'planifer_at',
        'typeDePlanification',
        'cancelled_at'
    ];

    protected $dates = [
        'planifer_at',
        'cancelled_at'
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function cancel()
    {
        return $this->status === 'SUCCES' && 
               $this->created_at->diffInMinutes(now()) <= 30;
    }
}
