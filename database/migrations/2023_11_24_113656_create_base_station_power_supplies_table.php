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
        Schema::create('base_station_power_supplies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->string('d')->nullable();
            $table->string('purpose')->nullable();
            $table->foreignId('ip_type_id')->nullable()->references('id')->on('ip_types')->onDelete('cascade');
            $table->foreignId('ip_manufacturer_id')->nullable()->references('id')->on('ip_manufacturers')->onDelete('cascade');
            $table->foreignId('battery_type_id')->nullable()->references('id')->on('battery_types')->onDelete('cascade');
            $table->string('power')->nullable();
            $table->string('voltage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_power_supplies');
    }
};
