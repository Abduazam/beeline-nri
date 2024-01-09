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
        Schema::create('base_station_sectors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->string('rssh')->nullable();
            $table->string('sector_number')->nullable();
            $table->integer('cell_id')->nullable();
            $table->foreignId('diapason_id')->nullable()->references('id')->on('diapasons')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->foreignId('e_node_b_id')->nullable()->references('id')->on('base_station_e_node_b_s')->onDelete('cascade');
            $table->integer('transceivers')->nullable();
            $table->integer('drate_transceivers')->nullable();
            $table->string('bts_id')->nullable();
            $table->string('rru_id')->nullable();
            //$table->foreignId('bts_id')->nullable()->references('id')->on('base_station_cabinets')->onDelete('cascade');
            //$table->foreignId('rru_id')->nullable()->references('id')->on('base_station_radio_modules')->onDelete('cascade');
            $table->integer('antenna_number')->nullable();
            $table->decimal('azimuth')->nullable();
            $table->boolean('metro')->nullable()->default(false);
            $table->string('lna_availability')->nullable();
            $table->string('lna_type')->nullable();
            $table->integer('lna_number')->nullable();
            $table->foreignId('duplex_filter_id')->nullable()->references('id')->on('duplex_filters')->onDelete('set null');
            $table->integer('duplex_filter_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_sectors');
    }
};
