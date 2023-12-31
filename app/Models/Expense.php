<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $primaryKey = 'expense_id';
    protected $fillable = [
        'project_id',
        'expense_date',
        'description',
        'amount',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
