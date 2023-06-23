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
        Schema::create('farmer_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name', 100);
            $table->string('district_id')->references('id')->on('districts')->nullable();
            $table->string('sub_county_id')->references('id')->on('sub_counties')->nullable();
            $table->string('lead_farmer_contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_groups');
    }
};
