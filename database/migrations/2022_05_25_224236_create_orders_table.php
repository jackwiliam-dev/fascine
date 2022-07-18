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
            $table->bigIncrements('id');
            $table->bigInteger('userId');
//            $table->foreign('userId')
//                ->references('id')
//                ->on('users')
//                ->onDelete('cascade');
            $table->string('sessionId');
            $table->string('token');
            $table->smallInteger('status');
            $table->float('subTotal');
            $table->float('itemDiscount');
            $table->float('tax');
            $table->float('shipping');
            $table->float('total');
            $table->string('promo');
            $table->float('discount');
            $table->float('grandTotal');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('mobile');
            $table->string('email');
            $table->string('line1');
            $table->string('line2');
            $table->string('city');
            $table->string('province');
            $table->string('country');
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
        Schema::dropIfExists('orders');
    }
};
