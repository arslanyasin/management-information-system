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
        // Supplier Migration
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('supplier_id');
            $table->string('supplier_name');
            $table->string('contact_person');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });

// Purchase Order Migration
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
            $table->date('order_date');
            $table->string('status');
            $table->timestamps();
        });


// Inventory Migration
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('inventory_id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->integer('quantity');
            $table->string('location');
            $table->timestamps();
        });

// Shipment Migration
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('shipment_id');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers');
            $table->date('shipment_date');
            $table->string('delivery_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
        Schema::dropIfExists('inventories');
        Schema::dropIfExists('purchase_orders');
        Schema::dropIfExists('suppliers');
    }
};
