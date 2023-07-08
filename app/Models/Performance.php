<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;
    protected $primaryKey = 'performance_id';
    protected $fillable = [
        'employee_id',
        'evaluation_date',
        'goal',
        'rating',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
