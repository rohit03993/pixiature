<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'section_name',
        'content',
        'image_path',
        'text_fields',
        'settings',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'text_fields' => 'array',
        'settings' => 'array',
        'is_active' => 'boolean',
    ];

    public static function getByKey($key)
    {
        return self::where('section_key', $key)->where('is_active', true)->first();
    }
}

