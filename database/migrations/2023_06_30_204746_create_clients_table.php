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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('superadmin_id')->nullable();
            $table->string('business_name')->nullable();
            $table->string('domain')->nullable();
            $table->integer('platform_id')->nullable();
            $table->integer('client_product_package_id')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'superadmin_id'], 'clients_user_id_superadmin_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
