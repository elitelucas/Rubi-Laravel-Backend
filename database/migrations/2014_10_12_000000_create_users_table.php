<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->string('business_name')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('role');
            $table
                ->enum('status', [
                    'active',
                    'inactive',
                    'suspended',
                    'terminated',
                    'on_hold',
                ])
                ->default('active');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('created_by_user_id')->nullable();
            $table->boolean('2fa_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
