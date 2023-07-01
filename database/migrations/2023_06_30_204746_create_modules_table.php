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
        Schema::create('modules', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('collection_id')->nullable();
            $table->integer('name')->nullable();
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->integer('admin_contact')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('modules');
    }
};
