<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'nip',
        'name',
        'jabatan'
    ];

    public function guest(): HasMany
    {
        return $this->hasMany(Guest::class, 'employee_id');
    }
}
