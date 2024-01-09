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
        Schema::create('position_clones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->string('source')->nullable();
            $table->foreignId('company_id')->nullable()->references('id')->on('companies')->onDelete('set null');
            $table->foreignId('place_type_id')->nullable()->references('id')->on('place_types')->onDelete('set null');
            $table->foreignId('place_type_group_id')->nullable()->references('id')->on('place_type_groups')->onDelete('set null');
            $table->foreignId('purpose_id')->nullable()->references('id')->on('purposes')->onDelete('set null');
            $table->foreignId('region_id')->nullable()->references('id')->on('regions')->onDelete('set null');
            $table->foreignId('area_id')->nullable()->references('id')->on('areas')->onDelete('set null');
            $table->string('name')->nullable();
            $table->foreignId('territory_id')->nullable()->references('id')->on('regions')->onDelete('set null');
            $table->string('address')->nullable();
            $table->foreignId('coordinate_id')->nullable()->references('id')->on('coordinate_types')->onDelete('set null');
            $table->string('latitude', 25)->nullable();
            $table->string('longitude', 25)->nullable();
            $table->foreignId('state_id')->nullable()->references('id')->on('states')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_clones');
    }
};
