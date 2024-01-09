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
        Schema::create('base_station_workflow_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_workflow_id')->references('id')->on('base_station_workflows')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['base_station_workflow_id', 'user_id'], 'base_station_workflow_users_w_u_ids_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_workflow_users');
    }
};
