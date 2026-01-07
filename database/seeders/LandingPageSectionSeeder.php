<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LandingPageSection;

class LandingPageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'hero',
                'section_name' => 'Hero Section',
                'content' => null,
                'image_path' => null, // Will use default image from public/images
                'text_fields' => [
                    'tagline_left' => 'Create Like a Pro',
                    'tagline_right' => 'Design Your Way Forward',
                    'main_headline' => "Learn.\nDesign.\nGrow."
                ],
                'settings' => [
                    'typing_animation' => true
                ],
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'section_key' => 'cta_bar',
                'section_name' => 'CTA Bar',
                'content' => null,
                'image_path' => null,
                'text_fields' => [
                    'cta_text' => 'Get Yourself Enrolled for the next batch'
                ],
                'settings' => null,
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'section_key' => 'stuck_section',
                'section_name' => 'Are you feeling Stuck Section',
                'content' => null,
                'image_path' => null,
                'text_fields' => [
                    'main_text' => 'Stuck',
                    'sub_text' => 'in creative path?',
                    'intro_text' => "We've been there. And so we built",
                    'sticky_notes' => [
                        'Lack of inspiration',
                        'Cluttered Mindset',
                        'Boring Routines',
                        'Lack of Focus'
                    ]
                ],
                'settings' => null,
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'section_key' => 'design_sprint',
                'section_name' => 'Design Sprint Section',
                'content' => null,
                'image_path' => null,
                'text_fields' => [
                    'duration' => '30 Days',
                    'title' => 'Design',
                    'subtitle' => 'Sprint',
                    'description' => 'Mastering The Hidden Creative Power',
                    'features' => [
                        'Live Practical Sessions',
                        'Career / Freelance Guidance',
                        'Recordings Available'
                    ]
                ],
                'settings' => null,
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'section_key' => 'students_section',
                'section_name' => '1000+ Students Section',
                'content' => null,
                'image_path' => null,
                'text_fields' => [
                    'count' => '1000+ Students',
                    'description' => 'Got guaranteed growth in their career'
                ],
                'settings' => null,
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'section_key' => 'before_after',
                'section_name' => 'Before/After Section',
                'content' => null,
                'image_path' => null,
                'text_fields' => [
                    'heading' => 'Only 1 month of Sprint get you there'
                ],
                'settings' => null,
                'display_order' => 6,
                'is_active' => true,
            ],
            [
                'section_key' => 'final_cta',
                'section_name' => 'Final CTA Section',
                'content' => null,
                'image_path' => null,
                'text_fields' => [
                    'heading' => 'Your design career starts here',
                    'subheading' => "Let's Create Together",
                    'button_text' => 'Book your seat now',
                    'tools' => ['ChatGPT', 'Ps', 'Ai', 'Gemini', 'Figma', 'XD']
                ],
                'settings' => null,
                'display_order' => 7,
                'is_active' => true,
            ],
            [
                'section_key' => 'footer',
                'section_name' => 'Footer',
                'content' => null,
                'image_path' => null,
                'text_fields' => [
                    'text' => 'Social Links and rest all details'
                ],
                'settings' => null,
                'display_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            // Encode JSON fields explicitly
            if (isset($section['text_fields']) && is_array($section['text_fields'])) {
                $section['text_fields'] = json_encode($section['text_fields']);
            }
            if (isset($section['settings']) && is_array($section['settings'])) {
                $section['settings'] = json_encode($section['settings']);
            }
            
            // Use updateOrCreate to avoid duplicate errors
            LandingPageSection::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}

