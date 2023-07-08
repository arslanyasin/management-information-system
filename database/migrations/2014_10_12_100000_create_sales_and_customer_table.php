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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });

        // Lead Migration
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('lead_id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->string('source');
            $table->string('status');
            $table->date('creation_date');
            $table->text('description');
            $table->timestamps();
        });
// Product Migration
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
        // Opportunity Migration
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('opportunity_id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->unsignedInteger('lead_id');
            $table->foreign('lead_id')->references('lead_id')->on('leads');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->decimal('amount', 8, 2);
            $table->date('close_date');
            $table->timestamps();
        });

        // Quote Migration
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('quote_id');
            $table->unsignedInteger('opportunity_id');
            $table->foreign('opportunity_id')->references('opportunity_id')->on('opportunities');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->timestamps();
        });
        // Order Migration
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger('opportunity_id');
            $table->foreign('opportunity_id')->references('opportunity_id')->on('opportunities');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->date('order_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('opportunities');
        Schema::dropIfExists('products');
        Schema::dropIfExists('leads');
        Schema::dropIfExists('customers');
    }
};
