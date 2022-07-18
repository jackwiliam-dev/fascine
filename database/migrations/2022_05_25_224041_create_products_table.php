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
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users')
//                ->onDelete('cascade');
            $table->string('title');
            $table->string('metaTitle');
            $table->string('slug');
            $table->tinyText('summary');
            $table->smallInteger('type');
            $table->string('sku');
            $table->float('price');
            $table->float('discount');
            $table->smallInteger('quantity');
            $table->tinyInteger('shop');
            $table->timestamps();
            $table->dateTime('publishedAt');
            $table->dateTime('startsAt');
            $table->dateTime('endsAt');
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
        Schema::dropIfExists('products');
    }
};
