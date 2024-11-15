<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasSufficientBalance($amount)
    {
        return $this->balance >= $amount;
    }

    protected $hidden = [
        'user_id',
        'id',
        'created_at',
        'updated_at'
    ];
}
