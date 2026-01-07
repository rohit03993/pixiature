<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'program_id',
        'status',
        'enrollment_date',
        'start_date',
        'end_date',
    ];

    protected function casts(): array
    {
        return [
            'enrollment_date' => 'date',
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

