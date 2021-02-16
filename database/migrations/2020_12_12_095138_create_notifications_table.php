<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('type')
            ->comment('1=affiliate user sing up,2=product sell,3=product comment,4=product review,5=post reaction,6=post comment,7=friend request send,8=accept friend request');
            $table->unsignedInteger('notification_to');
            $table->unsignedInteger('notification_from');
            $table->unsignedInteger('post_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1=unread,2=read');
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
        Schema::dropIfExists('notifications');
    }
}
