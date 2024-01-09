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
        Schema::create('base_station_antenna_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->string('sectors')->nullable();
            $table->integer('sector_number')->nullable();
            $table->foreignId('antenna_type_id')->nullable()->references('id')->on('antenna_types')->onDelete('cascade');
            $table->string('meta_article')->nullable();
            $table->string('top_antenna')->nullable();
            $table->double('azimuth')->nullable();
            $table->double('suspension_height')->nullable();
            $table->string('diapasons')->nullable();
            $table->string('direction_diagram')->nullable();
            $table->string('direction_diagram_2')->nullable();
            $table->string('ku_antennas')->nullable();
            $table->boolean('bisector')->nullable()->default(false);
            $table->string('electrical_tilt')->nullable();
            $table->string('mechanical_tilt')->nullable();
            $table->string('sum_tilts')->nullable();
            $table->foreignId('antenna_reception_id')->nullable()->references('id')->on('antenna_receptions')->onDelete('cascade');
            $table->foreignId('antenna_transmission_id')->nullable()->references('id')->on('antenna_transmissions')->onDelete('cascade');
            $table->foreignId('feeder_id')->nullable()->references('id')->on('feeders')->onDelete('cascade');
            $table->double('feeder_length')->nullable();
            $table->string('latitude', 25)->nullable();
            $table->string('longitude', 25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_antenna_equipment');
    }
};
