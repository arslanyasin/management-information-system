<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;
    protected $primaryKey = 'opportunity_id';
    protected $fillable = [
        'customer_id',
        'lead_id',
        'product_id',
        'amount',
        'close_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function quote()
    {
        return $this->hasOne(Quote::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
