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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->bigInteger('subcategory_id');
            $table->bigInteger('subcategory_child_id');
            $table->bigInteger('brand_id')->nullable();
            $table->string('tag_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price');
            $table->decimal('discount_price')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->enum('stock',['In Stock','Out Stock'])->default('In Stock');
            $table->integer('quantity')->default(1);
            $table->string('sku');
            $table->string('image');
            $table->string('images')->nullable();
            $table->boolean('featurab')->default(0);
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
