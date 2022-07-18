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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('productId');
//            $table->foreign('productId')
//                ->references('id')
//                ->on('products')
//                ->onDelete('cascade');
            $table->bigInteger('cartId');
//            $table->foreign('cartId')
//                ->references('id')
//                ->on('carts')
//                ->onDelete('cascade');
            $table->string('sku');
            $table->float('price');
            $table->float('discount');
            $table->smallInteger('quantity');
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
        Schema::dropIfExists('cart_items');
    }
};
