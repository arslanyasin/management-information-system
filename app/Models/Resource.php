<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $primaryKey = 'resource_id';
    protected $fillable = [
        'project_id',
        'employee_id',
        'resource_type',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id','project_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','employee_id');
    }
}
