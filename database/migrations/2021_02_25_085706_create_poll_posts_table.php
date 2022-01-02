<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_no');
            $table->unsignedBigInteger('poll_no');
            $table->unique(['post_no','poll_no']);
            $table->timestamps();
            $table->foreign('post_no')->references('id')->on('posts');
            $table->foreign('poll_no')->references('poll_id')->on('polls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poll_posts');
    }
}
