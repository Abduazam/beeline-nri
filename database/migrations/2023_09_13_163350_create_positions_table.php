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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number');
            $table->string('source')->nullable();
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->foreignId('place_type_id')->references('id')->on('place_types')->onDelete('restrict');
            $table->foreignId('place_type_group_id')->references('id')->on('place_type_groups')->onDelete('restrict');
            $table->foreignId('purpose_id')->references('id')->on('purposes')->onDelete('restrict');
            $table->foreignId('region_id')->references('id')->on('regions')->onDelete('restrict');
            $table->foreignId('area_id')->nullable()->references('id')->on('areas')->onDelete('restrict');
            $table->string('name')->nullable();
            $table->foreignId('territory_id')->references('id')->on('regions')->onDelete('restrict');
            $table->string('address')->nullable();
            $table->foreignId('coordinate_id')->references('id')->on('coordinate_types')->onDelete('restrict');
            $table->string('latitude', 25);
            $table->string('longitude', 25);
            $table->foreignId('state_id')->references('id')->on('states')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
