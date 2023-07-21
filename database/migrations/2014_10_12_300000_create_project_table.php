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
        // Project Migration
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->string('project_name');
            $table->string('price');
            $table->tinyInteger('price_type')->comment('1=Hourly 2=Fixed');
            $table->tinyInteger('priority')->comment('1=High 2=Medium 3=Low');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        // Task Migration
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->string('task_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->timestamps();
        });

        // Resource Migration
        Schema::create('resources', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->string('employee_id');
            $table->string('resource_type')->comment('1=lead 2=member');
            $table->timestamps();
        });

        // Expense Migration
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('expense_id');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->date('expense_date');
            $table->text('description');
            $table->decimal('amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('resources');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('projects');
    }
};
