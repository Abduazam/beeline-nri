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
        Schema::create('antenna_types', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('model');
            $table->string('diapasons')->nullable();
            $table->string('horizontal_diagram')->nullable();
            $table->string('vertical_diagram')->nullable();
            $table->string('ku_antenna')->nullable();
            $table->string('electrical_tilt')->nullable();
            $table->string('mechanical_tilt')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antenna_types');
    }
};
