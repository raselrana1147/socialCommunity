<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRattingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_rattings', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('user_id');
           $table->unsignedBigInteger('product_id');
           $table->tinyInteger('type')->default(1)->comment('1=text,2=image or emoji');
           $table->text('content');
           $table->integer('ratting');
           $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
           $table->timestamps();

           $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
           $table->foreign('product_id')->references('id')->on('products')
           ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_rattings');
    }
}
