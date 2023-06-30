<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_components', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('module_id')->nullable();
            $table->integer('component_id')->nullable();
            $table->string('prompt_command')->nullable();
            $table->string('long_description')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('layout_section_number')->nullable();
            $table->string('section_title')->nullable();
            $table->string('icon')->nullable();
            $table->string('version')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_components');
    }
};
