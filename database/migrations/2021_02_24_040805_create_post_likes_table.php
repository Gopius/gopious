<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_no');
            $table->unsignedBigInteger('instr_no')->nullable();
            $table->unsignedBigInteger('learner_no')->nullable();
            $table->unique(['post_no','instr_no']);
            $table->unique(['post_no','learner_no']);
            $table->timestamps();
            $table->foreign('post_no')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_likes');
    }
}
