<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quests', function (Blueprint $table) {
           $table->id();
           $table->string('title');
           $table->text('cover_picture');
           $table->text('description')->nullable();
           $table->text('icon')->nullable();
           $table->integer('qty')->nullable();
           $table->integer('credit')->default(0);
           $table->tinyInteger('status')->default(1)->comment('1=active,2=inactive');
           $table->tinyInteger('is_featured')->default(0)->comment('0=no,1=yes');
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
        Schema::dropIfExists('quests');
    }
}
