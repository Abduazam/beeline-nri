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
        Schema::create('position_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->references('id')->on('positions')->onDelete('restrict');
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
        Schema::dropIfExists('position_applications');
    }
};
