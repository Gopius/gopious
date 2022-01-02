<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id('quiz_question_id');
            $table->text('quiz_question_title');
            $table->string('type')->default('multi_choice');
            $table->tinyInteger('multiple_select')->default('0');
            $table->unsignedBigInteger('quiz_no');
            $table->foreign('quiz_no')->references('quiz_id')->on('quizzes');
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
        Schema::dropIfExists('quiz_questions');
    }
}
