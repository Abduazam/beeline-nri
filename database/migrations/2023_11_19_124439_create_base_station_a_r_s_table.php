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
        Schema::create('base_station_a_r_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->foreignId('lead_operator_id')->nullable()->references('id')->on('lead_operators')->onDelete('cascade');
            $table->foreignId('infrastructure_owner_id')->nullable()->references('id')->on('infrastructure_owners')->onDelete('cascade');
            $table->string('second_operator_number')->nullable();
            $table->string('contractor_for_reinforcement')->nullable();
            $table->foreignId('rrl_response_part_id')->nullable()->references('id')->on('rrl_response_parts')->onDelete('cascade');
            $table->foreignId('rns_need_id')->nullable()->references('id')->on('rns_needs')->onDelete('cascade');
            $table->foreignId('rns_result_id')->nullable()->references('id')->on('rns_results')->onDelete('cascade');
            $table->foreignId('strength_possibility_id')->nullable()->references('id')->on('strength_possibilities')->onDelete('cascade');
            $table->foreignId('rental_agreement_id')->nullable()->references('id')->on('rental_agreements')->onDelete('cascade');
            $table->foreignId('electricity_specification_id')->nullable()->references('id')->on('electricity_specifications')->onDelete('cascade');
            $table->foreignId('placement_specification_id')->nullable()->references('id')->on('placement_specifications')->onDelete('cascade');
            $table->foreignId('placement_required_id')->nullable()->references('id')->on('placement_requireds')->onDelete('cascade');
            $table->foreignId('financial_category_position_id')->nullable()->references('id')->on('financial_category_positions')->onDelete('cascade');
            $table->foreignId('power_category_id')->nullable()->references('id')->on('power_categories')->onDelete('cascade');
            $table->foreignId('wind_farm_specification_id')->nullable()->references('id')->on('wind_farm_specifications')->onDelete('cascade');
            $table->text('energy_department_comment')->nullable();
            $table->boolean('power_backup')->nullable()->default(false);
            $table->boolean('lighting_lights')->nullable()->default(false);
            $table->foreignId('vehicle_cable_id')->nullable()->references('id')->on('vehicle_cables')->onDelete('cascade');
            $table->string('number')->nullable();
            $table->text('additional_information')->nullable();
            $table->double('cabinets_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_a_r_s');
    }
};
