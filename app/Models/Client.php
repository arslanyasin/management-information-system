<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'client_id',
        'company_name',
        'contact_person',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
