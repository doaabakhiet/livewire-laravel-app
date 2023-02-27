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
            $table->string('name');
            $table->string('slug');
            $table->string('brand');
            $table->mediumText('small_description');
            $table->longText('description');
            
            $table->integer('original_price');
            $table->integer('selling_price');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('1=trending,0=not trending');
            $table->tinyInteger('featured')->default('0')->comment('1=featured,0=not featured');
            $table->tinyInteger('status')->default('0')->comment('1=visible,0=hidden');
            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
