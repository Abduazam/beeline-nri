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
        Schema::create('base_station_ofm_pos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_id')->references('id')->on('base_stations')->onDelete('cascade');
            $table->bigInteger('bs_number');
            $table->foreignId('diapason_id')->references('id')->on('diapasons')->onDelete('cascade');
            $table->string('po_number')->nullable();
            $table->string('ofm_number')->nullable();
            $table->string('po_project')->nullable();
            $table->string('ofm_project')->nullable();
            $table->string('status_ofm_project')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_ofm_pos');
    }
};
