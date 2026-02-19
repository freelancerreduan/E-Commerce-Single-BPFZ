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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->float('sub_total');
            $table->float('discount');
            $table->string('coupon_name')->nullable();
            $table->float('shipping');
            $table->float('total');
            $table->integer('invoice_id');
            $table->enum('status', array('pending', 'rejected', 'canceled', 'confirmed', 'return', 'completed'))->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
