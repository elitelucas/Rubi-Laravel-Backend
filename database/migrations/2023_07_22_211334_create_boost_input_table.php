<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('boost_input', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boost_id')->constrained('boost');
            $table->string('actor_name');
            $table->string('actor_id');
            $table->integer('api_endpoint');
            $table->string('organ_user_id');
            $table->string('personal_api_token');
            $table->string('organ_api_token');
            $table->json('params')->default(new Expression('(JSON_ARRAY())'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boost_input');
    }
};
