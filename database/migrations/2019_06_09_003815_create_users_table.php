<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nickname',30)->comment('昵称')->nullable();
            $table->string('openid',191)->unique()->comment('openid');
            $table->string('avatar',191)->comment('头像')->nullable();
            $table->string('real_name',30)->comment('真实姓名')->nullable();
            $table->string('mobile',11)->comment('手机号')->nullable();
            $table->string('address',100)->comment('地址')->nullable();
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
