<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AddressType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $addressTypes = [
            ['id' => 1, 'name' => 'Residential', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'name' => 'Commercial', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'name' => 'Billing', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'name' => 'Shipping', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 5, 'name' => 'Mailing', 'created_at' => \Carbon\Carbon::now()],
            ['id' => 6, 'name' => 'Work', 'created_at' => \Carbon\Carbon::now()],
        ];

        AddressType::insert($addressTypes);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        AddressType::truncate();
    }
};
