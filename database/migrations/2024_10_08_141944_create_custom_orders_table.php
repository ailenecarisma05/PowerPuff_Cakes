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
        Schema::create('custom_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('cake_flavor')->nullable();
            $table->string('cake_filling')->nullable();
            $table->string('cake_icing')->nullable();
            $table->string('tiers')->nullable();
            $table->string('cake_shape')->nullable();
            $table->string('cake_size_width')->nullable();
            $table->string('cake_size_height')->nullable();
            $table->string('theme')->nullable();
            $table->integer('cupcakes')->nullable();
            $table->string('candles')->nullable();
            $table->integer('candle_numbers')->nullable();
            $table->string('pickup_delivery')->nullable();

            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();

            $table->text('additional_info')->nullable();
            $table->text('card_message')->nullable();
            $table->time('delivery_time')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_period')->nullable();

            $table->string('delivery_status')->default('Processing');
            $table->decimal('total_price', 10, 2)->nullable();

            $table->timestamps();

            // Foreign key reference
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_orders');
    }
};
