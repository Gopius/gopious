<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_no');
            $table->unsignedBigInteger('course_no');
            $table->unique(['post_no','course_no']);
            $table->timestamps();
            $table->foreign('post_no')->references('id')->on('posts');
            $table->foreign('course_no')->references('course_id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_posts');
    }
}
