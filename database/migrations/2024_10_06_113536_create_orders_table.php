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
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            
            $table->string('product_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->string('product_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('size')->nullable();
            $table->string('flavor')->nullable();
            $table->string('filling')->nullable();
            $table->string('icing')->nullable();
            $table->integer('candles')->nullable();
            $table->string('celebrant_name')->nullable();
            $table->text('card_message')->nullable();
            $table->date('delivery_date')->nullable();
            $table->time('delivery_time')->nullable();

            $table->string('payment_status')->default('Pending');
            $table->string('delivery_status')->default('Processing');
            $table->decimal('shipping_fee', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable(); 
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
