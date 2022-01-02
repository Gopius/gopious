<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_learners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_no');
            $table->unsignedBigInteger('learner_no');
            $table->unique(['post_no','learner_no']);
            $table->timestamps();
            $table->foreign('post_no')->references('id')->on('posts');
            $table->foreign('learner_no')->references('learner_id')->on('learners');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_learners');
    }
}
