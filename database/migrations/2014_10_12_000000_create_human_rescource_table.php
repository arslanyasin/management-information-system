<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Employee Migration
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('hire_date');
            $table->date('birthday');
            $table->string('job_title');
            $table->string('address');
            $table->string('gender');
            $table->timestamps();
        });

        // Attendance Migration
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('attendance_id');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->date('date');
            $table->time('clock_in_time');
            $table->time('clock_out_time');
            $table->timestamps();
        });

        // Leave Migration
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('leave_id');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->string('leave_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->timestamps();
        });

        // Performance Migration
        Schema::create('performances', function (Blueprint $table) {
            $table->increments('performance_id');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->date('evaluation_date');
            $table->string('goal');
            $table->integer('rating');
            $table->timestamps();
        });

        // Training Migration
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('training_id');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->string('training_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('trainer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('performances');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('leaves');
        Schema::dropIfExists('employees');
    }
};
