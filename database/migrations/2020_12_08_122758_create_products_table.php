<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('product_type')->comment('1=single product,2=four set photo');
            $table->unsignedInteger('location_id');
            $table->tinyInteger('skin_level')->comment('1=lingerie,2=topless,3=nude');
            $table->integer('require_token');
            $table->text('item_url')->nullable();
            $table->text('description')->nullable();
            $table->string('image_type')->nullable()->comment('single and fourset');
            $table->string('single_image')->nullable();
            $table->text('image_view')->nullable();
            $table->text('thumbnail')->nullable();
            $table->unsignedInteger('user_id');
            $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')
            //     ->onDelete('cascade');
            // $table->foreign('location_id')->references('id')->on('locations')
            //     ->onDelete('cascade');
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
}
