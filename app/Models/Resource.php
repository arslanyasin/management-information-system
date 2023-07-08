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
        'resource_name',
        'resource_type',
        'quantity',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
