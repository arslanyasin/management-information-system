<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'account_id',
        'date',
        'description',
        'amount',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
