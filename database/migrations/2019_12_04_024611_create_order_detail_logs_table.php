<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_detail_id')->unsigned();
            $table->foreign('orders_detail_id')->references('id')->on('orders_detail')->onDelete('cascade');
            $table->longText('content');
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
        Schema::dropIfExists('order_detail_logs');
    }
}
