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
        Schema::create('base_station_transport_networks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('base_station_application_id')->references('id')->on('base_station_applications')->onDelete('cascade');
            $table->string('link_to_prts')->nullable();
            $table->foreignId('responsible_user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->string('gfc_node')->nullable();
            $table->boolean('correct_id')->default(false);
            $table->foreignId('vehicle_type_id')->nullable()->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->foreignId('position_set_id')->nullable()->references('id')->on('position_sets')->onDelete('cascade');
            $table->foreignId('line_status_id')->nullable()->references('id')->on('line_statuses')->onDelete('cascade');
            $table->string('line_number')->nullable();
            $table->string('landowner')->nullable();
            $table->foreignId('equipment_type_id')->nullable()->references('id')->on('equipment_types')->onDelete('cascade');
            $table->string('interface')->nullable();
            $table->double('tdm_band')->nullable();
            $table->double('ip_band')->nullable();
            $table->string('generalization_frequency')->nullable();
            $table->double('speed')->nullable();
            $table->double('antenna_diameter_in_ta')->nullable();
            $table->double('antenna_diameter_in_ta_2')->nullable();
            $table->double('suspension_height_in_ta')->nullable();
            $table->double('suspension_height_in_ta_2')->nullable();
            $table->string('power')->nullable();
            $table->double('azimuth_a')->nullable();
            $table->string('reservation')->nullable();
            $table->string('node_code')->nullable();
            $table->string('item_title')->nullable();
            $table->string('item_code')->nullable();
            $table->string('response_title')->nullable();
            $table->string('response_kit')->nullable();
            $table->string('response_latitude', 25)->nullable();
            $table->double('response_longitude', 25)->nullable();
            $table->double('antenna_diameter_in_tb')->nullable();
            $table->double('antenna_diameter_in_tb_2')->nullable();
            $table->double('suspension_height_in_tb')->nullable();
            $table->double('suspension_height_in_tb_2')->nullable();
            $table->double('azimuth_b')->nullable();
            $table->date('change_date')->nullable();
            $table->double('range')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_station_transport_networks');
    }
};
