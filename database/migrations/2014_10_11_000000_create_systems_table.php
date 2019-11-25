<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('shortcut_logo');
            $table->string('share_image');
            $table->string('title');
            $table->string('seo_keyword');
            $table->string('seo_description');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('zalo');
            $table->string('youtube');
            $table->string('website');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->boolean('highlights');
            $table->boolean('display');
            $table->longText('script');
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
        Schema::dropIfExists('systems');
    }
}
