<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'project_id';
    protected $fillable = [
        'project_name',
        'description',
        'price',
        'price_type',
        'client_id',
        'priority',
        'start_date',
        'end_date',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function resources()
    {
        return $this->hasMany(Resource::class,'project_id','project_id');
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
