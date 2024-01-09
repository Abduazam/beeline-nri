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
        Schema::create('rru_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('model')->nullable();
            $table->string('manufacturer')->nullable();
            $table->integer('max_number_transceivers')->nullable();
            $table->string('diapasons')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rru_types');
    }
};
