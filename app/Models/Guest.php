<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
     use HasFactory;
    protected $table = 'guests';
    protected $fillable = [
        'name',
        'telp',
        'email',
        'alamat',
        'asal_instansi',
        'employees_id',
        'keperluan'
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
