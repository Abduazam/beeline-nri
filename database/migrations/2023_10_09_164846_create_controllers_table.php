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
        Schema::create('controllers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->nullable()->references('id')->on('regions')->onDelete('set null');
            $table->string('number');
            $table->string('name');
            $table->string('gfk')->nullable();
            $table->string('number_position');
            $table->string('position');
            $table->string('address')->nullable();
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controllers');
    }
};
