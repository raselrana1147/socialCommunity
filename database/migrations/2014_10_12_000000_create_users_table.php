<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('salt');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('dob')->nullable();
            $table->text('birth_place')->nullable();
            $table->string('occupation')->nullable();
            $table->text('website')->nullable();
            $table->tinyInteger('life_status')->default(1)
            ->comment('1=single,2=engaged,3=maried,4=divorced,5=In a relationship');
            $table->integer('credit')->default(0);
            $table->float('balance')->default(0);
            $table->text('avatar')->nullable();
            $table->text('cover_photo')->nullable();
            $table->text('about')->nullable();
            $table->tinyInteger('is_affiliate')->default(1)->comment('1=No,2=Yes');
            $table->string('affiliate_id')->nullable();
            $table->tinyInteger('status')->default(1)
            ->comment('1=pending,2=activated,3=inactive,4=locked,5=suspended');
            $table->tinyInteger('email_active')->default(0)->comment('0=inactive,1=activated');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
