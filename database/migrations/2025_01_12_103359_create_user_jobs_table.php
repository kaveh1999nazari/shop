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
        Schema::create('user_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('title')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->float('monthly_salary')->nullable();
            $table->integer('work_experience_duration')->nullable();
            $table->enum('work_type', ['government', 'private', 'freelancer', 'student', 'other']);
            $table->enum('contract_type', ['owner', 'project', 'part_time', 'full_time', 'other']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_jobs');
    }
};
