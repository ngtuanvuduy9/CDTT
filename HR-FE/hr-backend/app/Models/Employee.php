<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code',
        'fullname',
        'cccd',
        'dob',
        'gender',
        'education_level',
        'email',
        'phone',
        'address',
        'department_id',
        'position_id',
        'hired_date',
        'salary',
        'photo'
    ];

    // Quan hệ với Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Quan hệ với Position
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
