<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnerQuizOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learner_quiz_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_option_no')->nullable();
            $table->unsignedBigInteger('quiz_question_no');
            $table->unsignedBigInteger('learner_no');
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unique(['quiz_question_no','learner_no']);
            $table->timestamps();
            $table->foreign('quiz_question_no')->references('quiz_question_id')->on('quiz_questions');
            // $table->foreign('quiz_option_no')->references('quiz_option_id')->on('quiz_options');
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
        Schema::dropIfExists('learner_quiz_options');
    }
}
