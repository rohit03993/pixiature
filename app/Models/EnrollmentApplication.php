<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'email', 'phone', 'age', 'city_country',
        'current_status', 'field_of_study_work', 'design_experience',
        'design_tools', 'design_tools_others',
        'why_learn_design', 'what_excites_about_design', 'want_to_learn', 'want_to_achieve',
        'weekly_time_commitment', 'has_laptop_desktop', 'preferred_batch_timing',
        'investment_readiness', 'how_heard_about_course', 'how_heard_other',
        'questions_or_share', 'status'
    ];

    protected $casts = [
        'design_tools' => 'array',
        'why_learn_design' => 'array',
        'want_to_learn' => 'array',
    ];
}
