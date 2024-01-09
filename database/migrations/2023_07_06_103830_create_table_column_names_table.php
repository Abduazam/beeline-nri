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
        Schema::create('table_column_names', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->string('table_name');
            $table->string('column_name');
            $table->string('translation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['locale', 'table_name', 'column_name']);
            $table->unique(['locale', 'table_name', 'column_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_column_names');
    }
};
