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
        Schema::create('general_contractors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('general_contractor_type_id')->references('id')->on('general_contractor_types')->onDelete('cascade');
            $table->string('inn');
            $table->string('title');
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_contractors');
    }
};
