<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('enrollment_applications', function (Blueprint $table) {
            $table->id();
            
            // Basic Details
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->integer('age')->nullable();
            $table->string('city_country')->nullable();
            
            // About the Student
            $table->enum('current_status', ['school_student', 'college_student', 'working_professional', 'freelancer', 'other'])->nullable();
            $table->string('field_of_study_work')->nullable();
            $table->enum('design_experience', ['no_experience', 'basic_understanding', 'intermediate', 'advanced'])->nullable();
            $table->json('design_tools')->nullable(); // Array of tools: photoshop, illustrator, premiere_pro, figma, canva, none, others
            $table->text('design_tools_others')->nullable();
            
            // Interest & Motivation
            $table->json('why_learn_design')->nullable(); // Array: career_purpose, freelancing, personal_interest, side_hustle, skill_upgrade
            $table->text('what_excites_about_design')->nullable();
            $table->json('want_to_learn')->nullable(); // Array: graphic_designing, ui_ux_designing, motion_graphics, video_editing, social_media_creatives
            $table->text('want_to_achieve')->nullable();
            
            // Expectations & Practical Info
            $table->enum('weekly_time_commitment', ['less_than_5_hrs', '5_10_hrs', '10_plus_hrs'])->nullable();
            $table->enum('has_laptop_desktop', ['yes', 'no_planning_to_arrange'])->nullable();
            $table->enum('preferred_batch_timing', ['morning', 'afternoon', 'evening'])->nullable();
            
            // Financial & Commitment
            $table->enum('investment_readiness', ['yes', 'need_emi', 'need_to_discuss'])->nullable();
            $table->enum('how_heard_about_course', ['instagram', 'youtube', 'friend', 'whatsapp', 'other'])->nullable();
            $table->string('how_heard_other')->nullable();
            
            // Final
            $table->text('questions_or_share')->nullable();
            
            // Status tracking
            $table->enum('status', ['draft', 'submitted', 'reviewed', 'accepted', 'rejected'])->default('draft');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_applications');
    }
};
