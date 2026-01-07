<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'program_id',
        'title',
        'description',
        'scheduled_at',
        'duration_minutes',
        'meeting_link',
        'recording_url',
        'is_live',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_at' => 'datetime',
            'is_live' => 'boolean',
        ];
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}

