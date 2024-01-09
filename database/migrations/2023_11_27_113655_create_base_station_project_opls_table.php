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
        Schema::create('base_station_project_opls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_id')->references('id')->on('base_stations')->onDelete('cascade');
            $table->string('source')->nullable();
            $table->string('diapasons')->nullable();
            $table->bigInteger('number')->nullable();
            $table->date('created_date')->nullable();
            $table->string('status')->nullable();
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_project_opls');
    }
};
