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
        Schema::create('base_station_cabinets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->foreignId('bts_type_id')->nullable()->references('id')->on('bts_types')->onDelete('cascade');
            $table->string('bts_number')->nullable();
            $table->string('bs_name_nms')->nullable();
            $table->integer('transceivers_number')->nullable();
            $table->integer('e1_threads_number')->nullable();
            $table->integer('mb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_cabinets');
    }
};
