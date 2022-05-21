<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal')->nullable();
            $table->decimal('discount')->default(0);
            $table->decimal('tax')->default(0);
            $table->decimal('total');
            $table->string('tracking_code');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('number');
            $table->string('email');
            $table->string('country');
            $table->string('city');
            $table->integer('zipcode');
            $table->longText('address');
            $table->longText('order_note');
            $table->enum('status',['processing','delivered','canceled'])->default('processing');
            $table->boolean('shipping_different')->default(0);
            $table->date('delivery_date')->nullable();
            $table->date('canceled_date')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
