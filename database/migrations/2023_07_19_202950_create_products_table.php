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
        Schema::disableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->text('long_description');
            $table->foreignId('category_id')->constrained('product_categories');
            $table->boolean('active')->default(true);
            $table->decimal('affiliate_monthly_price', 8, 2);
            $table->decimal('affiliate_annual_price', 8, 2);
            $table->decimal('retail_monthly_price', 8, 2);
            $table->decimal('retail_annual_price', 8, 2);
            $table->boolean('recurring')->default(true);
            $table->decimal('qv', 8, 2);
            $table->decimal('cv', 8, 2);
            $table->decimal('pv', 8, 2);
            $table->decimal('qc', 8, 2);
            $table->decimal('ac', 8, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
