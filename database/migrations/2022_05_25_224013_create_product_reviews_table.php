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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('productId');
//            $table->foreign('productId')
//                ->references('id')
//                ->on('products')
//                ->onDelete('cascade');
            $table->bigInteger('parentId');
            $table->string('title');
            $table->smallInteger('rating');
            $table->tinyInteger('published');
            $table->text('note');
            $table->timestamps();
            $table->boolean('deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
};
