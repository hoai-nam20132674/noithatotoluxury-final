<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_clients_id')->unsigned();
            $table->foreign('users_clients_id')->references('id')->on('users_clients')->onDelete('cascade');
            $table->integer('systems_id')->unsigned();
            $table->foreign('systems_id')->references('id')->on('systems')->onDelete('cascade');
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
        Schema::dropIfExists('follow_systems');
    }
}
