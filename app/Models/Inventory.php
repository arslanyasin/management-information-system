<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $primaryKey = 'inventory_id';
    protected $fillable = [
        'product_id',
        'quantity',
        'location',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
