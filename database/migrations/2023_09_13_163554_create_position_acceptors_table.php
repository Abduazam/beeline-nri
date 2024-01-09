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
        Schema::create('position_acceptors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_application_id')->references('id')->on('position_applications')->onDelete('cascade');
            $table->foreignId('workflow_id')->references('id')->on('position_workflows')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->mediumText('comment')->nullable();
            $table->smallInteger('active')->default(0);
            $table->timestamps();

            $table->unique(['position_application_id', 'workflow_id', 'user_id'], 'pa_wf_user_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_acceptors');
    }
};
