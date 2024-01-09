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
        Schema::create('base_station_radio_modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->string('rru_number');
            $table->foreignId('rru_type_id')->references('id')->on('rru_types')->onDelete('cascade');
            $table->string('sectors')->nullable();
            $table->string('control_module_id')->nullable();
            //$table->foreignId('control_module_id')->references('id')->on('base_station_control_modules')->onDelete('cascade');
            $table->integer('transceivers')->nullable();
            $table->foreignId('optical_cable_id')->nullable()->references('id')->on('optical_cables')->onDelete('cascade');
            $table->integer('optical_cable_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_radio_modules');
    }
};
