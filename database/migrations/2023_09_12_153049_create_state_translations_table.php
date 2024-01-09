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
        Schema::create('state_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('locale');
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['state_id', 'locale']);
            $table->index(['state_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_translations');
    }
};
