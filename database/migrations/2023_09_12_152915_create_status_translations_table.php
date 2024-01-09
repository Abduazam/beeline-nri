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
        Schema::create('status_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->string('locale');
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['status_id', 'locale']);
            $table->index(['status_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_translations');
    }
};
