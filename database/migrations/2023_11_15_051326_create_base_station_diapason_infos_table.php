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
        Schema::create('base_station_diapason_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->foreignId('room_type_id')->nullable()->references('id')->on('room_types')->onDelete('cascade');
            $table->foreignId('hardware_room_id')->nullable()->references('id')->on('hardware_rooms')->onDelete('cascade');
            $table->foreignId('hardware_owner_id')->nullable()->references('id')->on('hardware_owners')->onDelete('cascade');
            $table->foreignId('location_antenna_id')->nullable()->references('id')->on('location_antennas')->onDelete('cascade');
            $table->double('height_afu')->nullable();
            $table->foreignId('general_contractor_id')->nullable()->references('id')->on('general_contractors')->onDelete('cascade');
            $table->string('type_ka')->nullable();
            $table->foreignId('k_a_id')->nullable()->references('id')->on('k_a_s')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_diapason_infos');
    }
};
