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
        Schema::create('place_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_type_id')->references('id')->on('place_types')->onDelete('cascade');
            $table->string('locale');
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['place_type_id', 'locale']);
            $table->index(['place_type_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_type_translations');
    }
};
