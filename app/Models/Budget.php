<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $primaryKey = 'budget_id';
    protected $fillable = [
        'department_id',
        'budget_year',
        'allocated_amount',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
