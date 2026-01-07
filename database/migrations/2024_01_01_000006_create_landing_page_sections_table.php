<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // e.g., 'hero', 'stuck_section', 'design_sprint'
            $table->string('section_name'); // Display name
            $table->text('content')->nullable(); // JSON or text content
            $table->string('image_path')->nullable(); // Path to image
            $table->json('text_fields')->nullable(); // Store multiple text fields as JSON
            $table->json('settings')->nullable(); // Animation settings, colors, etc.
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_page_sections');
    }
};

