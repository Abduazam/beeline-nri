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
        Schema::create('base_station_control_modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->foreignId('mu_type_id')->references('id')->on('mu_types')->onDelete('cascade');
            $table->string('mu_number');
            $table->foreignId('room_type_id')->nullable()->references('id')->on('room_types')->onDelete('cascade');
            $table->string('cabinet_id')->nullable();
            // $table->foreignId('cabinet_id')->references('id')->on('base_station_cabinets')->onDelete('cascade');
            $table->string('bs_name_nms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_control_modules');
    }
};
