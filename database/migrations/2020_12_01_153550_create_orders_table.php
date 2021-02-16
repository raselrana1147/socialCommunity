<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->text('product_data');
            $table->float('total_price');
            $table->string('order_id');
            $table->text('transaction_id')->nullable();
            $table->string('user_ip')->nullable();
            $table->text('order_note')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=pending,2=approved,3=cancelled');
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
        Schema::dropIfExists('orders');
    }
}
