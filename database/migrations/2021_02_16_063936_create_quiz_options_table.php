<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id('quiz_option_id');
            $table->string('quiz_option_title');
            $table->tinyInteger('is_correct')->default(0);
            $table->unsignedBigInteger('quiz_question_no');
            $table->foreign('quiz_question_no')->references('quiz_question_id')->on('quiz_questions');
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
        Schema::dropIfExists('quiz_options');
    }
}
