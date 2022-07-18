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
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('userId');
//            $table->foreign('productId')
//                ->references('id')
//                ->on('products')
//                ->onDelete('cascade');
            $table->string('sessionId');
            $table->string('token');
            $table->smallInteger('status');
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
        Schema::dropIfExists('carts');
    }
};
