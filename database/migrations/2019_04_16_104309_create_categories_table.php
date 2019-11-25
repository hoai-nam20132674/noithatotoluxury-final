<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->string('seo_description');
            $table->string('seo_keyword');
            $table->string('title');
            $table->string('share_image');
            $table->string('avatar');
            $table->integer('parent_id');
            $table->integer('systems_id')->unsigned();
            $table->foreign('systems_id')->references('id')->on('systems')->onDelete('cascade');
            $table->boolean('display');
            $table->boolean('highlights');
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
        Schema::dropIfExists('categories');
    }
}
