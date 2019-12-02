<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('url');
            $table->string('video');
            $table->longText('content');
            $table->longText('seo_description');
            $table->longText('short_description');
            $table->string('seo_keyword');
            $table->string('title');
            $table->string('code');
            $table->string('share_image');
            $table->integer('rate');
            $table->integer('orders');
            $table->boolean('highlights');
            $table->boolean('display');
            $table->integer('views');
            $table->integer('price');
            $table->integer('amount');
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
}
