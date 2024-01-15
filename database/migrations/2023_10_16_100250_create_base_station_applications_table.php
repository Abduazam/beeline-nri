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
        Schema::create('base_station_applications', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->foreignId('base_station_id')->references('id')->on('base_stations')->onDelete('cascade');
            $table->foreignId('application_type_id')->references('id')->on('application_types')->onDelete('restrict');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->mediumText('comment')->nullable();
            $table->foreignId('status_id')->references('id')->on('statuses')->onDelete('restrict');
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_applications');
    }
};
