<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_option', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');//作者
            $table->integer('view');//浏览
            $table->integer('like');//点赞
            $table->integer('replay');//回复留言
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
        Schema::dropIfExists('article_option');
    }
}
