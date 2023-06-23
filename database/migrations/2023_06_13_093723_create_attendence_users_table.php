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
    Schema::create('attendence_users', function (Blueprint $table) {
        $table->id();
        $table->string('ip');
        $table->timestamp('checkIn_time')->nullable();
        $table->timestamp('checkOut_time')->nullable();
        $table->string('stay_duration')->nullable();
        $table->string('workDay_status')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendence_users');
    }
};