<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_no');
            $table->unsignedBigInteger('quiz_no');
            $table->unique(['chapter_no','quiz_no']);
            $table->timestamps();
            $table->foreign('chapter_no')->references('chapter_id')->on('chapters');
            $table->foreign('quiz_no')->references('quiz_id')->on('quizzes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_quizzes');
    }
}
