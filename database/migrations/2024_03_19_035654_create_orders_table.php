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
            $table->unsignedBigInteger('address_id');
            $table->timestamp('order_date')->nullable();
            $table->enum('status',['pending','in_progress','out_for_delivery','delivered'])->default('pending');
            $table->decimal('service_price')->nullable();
            $table->decimal('delivery_price')->nullable();
            $table->decimal('total_price')->nullable();
            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('total_price_after_discount')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('promo_code_id')->references('id')->on('promo_codes');
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
