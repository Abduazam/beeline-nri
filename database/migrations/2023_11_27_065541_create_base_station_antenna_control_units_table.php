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
        Schema::create('base_station_antenna_control_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->boolean('rru_control')->nullable()->default(false);
            $table->integer('antenna_id')->nullable();
            $table->string('antenna_type')->nullable();
            $table->string('sectors')->nullable();
            $table->string('number_mcu_rru')->nullable();
            $table->string('type_mcu_rru')->nullable();
            $table->foreignId('motor_id')->nullable()->references('id')->on('motors')->onDelete('cascade');
            $table->foreignId('i_cable_id')->nullable()->references('id')->on('i_cables')->onDelete('cascade');
            $table->foreignId('o_cable_id')->nullable()->references('id')->on('o_cables')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_antenna_control_units');
    }
};
