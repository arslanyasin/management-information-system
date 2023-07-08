<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentPosition extends Model
{
    use HasFactory;
    protected $primaryKey = 'position_id';
    protected $fillable = [
        'position_name',
        'department_id'
    ];

    public function department()
    {
        return $this->hasOne(Department::class,'department_id','department_id');
    }
}
