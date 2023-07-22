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
        Schema::create('modules_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('modules');
            $table->foreignId('component_id')->constrained('components');
            $table->string('prompt_command')->nullable();
            $table->string('long_description')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('layout_section_number')->nullable();
            $table->string('section_title')->nullable();
            $table->string('icon')->nullable();
            $table->string('version')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules_components');
    }
};
