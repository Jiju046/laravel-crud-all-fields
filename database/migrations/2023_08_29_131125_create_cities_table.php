<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('city_name');
            $table->timestamps();
        });

        DB::table('cities')->insert([
            ['city_name' => 'Coimbatore'],
            ['city_name' => 'Chennai'],
            ['city_name' => 'Bangalore'],
            ['city_name' => 'Madurai'],
            ['city_name' => 'Hyderabad'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
