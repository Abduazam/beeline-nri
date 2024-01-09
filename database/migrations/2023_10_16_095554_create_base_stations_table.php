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
        Schema::create('base_stations', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->foreignId('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->boolean('transfer_distribution')->nullable();
            $table->string('search_latitude', 25)->nullable();
            $table->string('search_longitude', 25)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_stations');
    }
};
