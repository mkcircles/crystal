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
        Schema::create('farmer_group_members', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_uuid');
            $table->string('member_name', 100);
            $table->string('member_phone')->nullable();
            $table->string('member_email')->nullable();
            $table->string('member_address')->nullable();
            $table->date('member_dob')->nullable();
            $table->string('farmer_group_id')->references('id')->on('farmer_groups');
            $table->string('NIN')->nullable();
            $table->string('hh_household_head')->nullable();
            $table->string('hh_district')->nullable();
            $table->string('hh_subcounty')->nullable();
            $table->string('hh_parish')->nullable();
            $table->string('hh_village')->nullable();
            $table->string('hh_registration_date')->nullable();
            $table->string('hh_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmer_group_members');
    }
};
