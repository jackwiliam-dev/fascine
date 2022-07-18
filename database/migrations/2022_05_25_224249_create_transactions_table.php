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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId');
//            $table->foreign('userId')
//                ->references('id')
//                ->on('users')
//                ->onDelete('cascade');
            $table->bigInteger('orderId');
//            $table->foreign('orderId')
//                ->references('id')
//                ->on('orders')
//                ->onDelete('cascade');
            $table->string('code');
            $table->smallInteger('type');
            $table->smallInteger('mode');
            $table->smallInteger('status');
            $table->timestamps();
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
