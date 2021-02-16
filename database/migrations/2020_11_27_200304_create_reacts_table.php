<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reacts', function (Blueprint $table) {
            $table->id();
            $table->integer('react_type')->comment('1=like,2=love,3=dislike,4=happy,5=funny,6=wow,7=angry,8=sad');
            $table->integer('user_id');
            $table->unsignedBigInteger('post_or_comment_id');
            $table->integer('type')->comment('1=post,2=comment');
            $table->integer('status')->comment('1=active,2=inactive');

            $table->foreign('post_or_comment_id')->references('id')->on('posts')
                ->onDelete('cascade');
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
        Schema::dropIfExists('reacts');
    }
}
