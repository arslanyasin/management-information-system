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
        // Budget Migration
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('department_id');
            $table->string('department_name');
            $table->timestamps();
        });
        // Budget Migration
        Schema::create('budgets', function (Blueprint $table) {
            $table->increments('budget_id');
            $table->unsignedInteger('department_id');
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->integer('budget_year');
            $table->decimal('allocated_amount', 8, 2);
            $table->timestamps();
        });
        // Account Migration
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('account_id');
            $table->string('account_name');
            $table->string('account_type');
            $table->timestamps();
        });
        // Transaction Migration
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('account_id')->on('accounts');
            $table->date('date');
            $table->string('description');
            $table->decimal('amount', 8, 2);
            $table->timestamps();
        });

        // Invoice Migration
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('invoice_id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->decimal('total_amount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('department');

    }
};
