<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'hire_date',
        'job_title',
        'department_id',
    ];

    public function department()
    {
        return $this->hasOne(Department::class, 'department_id', 'department_id');
    }

    public function position()
    {
        return $this->hasOne(DepartmentPosition::class, 'id', 'position_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
