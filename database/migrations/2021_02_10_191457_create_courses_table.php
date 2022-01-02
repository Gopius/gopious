<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_title');
            $table->string('course_desc');
            $table->tinyInteger('course_status');
            $table->string('course_cover_img_url');
            $table->unsignedBigInteger('cat_no');
            $table->timestamps();
            
            $table->foreign('cat_no')->references('cat_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
