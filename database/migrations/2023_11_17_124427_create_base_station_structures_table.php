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
        Schema::create('base_station_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->foreignId('structure_type_id')->nullable()->references('id')->on('structure_types')->onDelete('cascade');
            $table->foreignId('structure_owner_id')->nullable()->references('id')->on('structure_owners')->onDelete('cascade');
            $table->string('height')->nullable();
            $table->foreignId('structure_location_id')->nullable()->references('id')->on('structure_locations')->onDelete('cascade');
            $table->double('height_afu')->nullable();
            $table->double('height_rrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_structures');
    }
};
