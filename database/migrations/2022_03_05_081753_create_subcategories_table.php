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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->boolean('status')->default(true);
            $table->timestamps();
            //$table->foreign('category_id')->refernces('id')->on('categories')->onDelete('cascade');
           // $table->foreign('category_id')->refernces('id')->on('categories')->onDelete('cascade');
           
          
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
};
