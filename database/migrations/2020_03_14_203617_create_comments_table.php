<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('posts_id')->unsigned();
            $table->string('comment_name', 255);
            $table->string('comment_email', 255);
            $table->text('comment_content');
            $table->timestamps();
        });
        Schema::table('comments', function ($table){
            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('user_id');
        Schema::dropForeign('posts_id');
        Schema::dropIfExists('comments');
    }
}
