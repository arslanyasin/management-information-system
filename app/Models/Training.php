<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $primaryKey = 'training_id';
    protected $fillable = [
        'employee_id',
        'training_name',
        'start_date',
        'end_date',
        'trainer',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
