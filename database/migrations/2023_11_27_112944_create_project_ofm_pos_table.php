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
        Schema::create('project_ofm_pos', function (Blueprint $table) {
            $table->id();
            $table->string('project_target');
            $table->string('project_type');
            $table->string('range_selection');
            $table->string('project_documents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_ofm_pos');
    }
};
