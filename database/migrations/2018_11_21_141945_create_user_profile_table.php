<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->integer('id');//用户信息ID
            $table->integer('user_id');//用户ID
            $table->string('job',20);//工作
            $table->string('avatar',100);//头像
            $table->string('real_name',10);//真是姓名
            $table->integer('province');//省
            $table->integer('city');//市
            $table->string('address',100);//地址
            $table->string('skills',100);//技能（标签id）
            $table->string('weibo',20);//微博
            $table->string('github',20);//github
            $table->string('twitter',20);//推特
            $table->string('location',20);//定位
            $table->string('personal_website',20);//个人主页
            $table->string('education',20);//学历
            $table->string('introduction',500);//简介
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
        Schema::dropIfExists('user_profile');
    }
}
