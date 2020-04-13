<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('user_id')->unsigned();
            $table->text('post_content');
            $table->text('post_title');
            $table->boolean('post_status');
            $table->string('post_type',20);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::table('posts', function ($table){
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
        Schema::dropIfExists('posts');
    }
}
