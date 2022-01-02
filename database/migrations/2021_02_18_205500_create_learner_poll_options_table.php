<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnerPollOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learner_poll_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('poll_option_no');
            $table->unsignedBigInteger('learner_no');
            $table->unique(['poll_option_no','learner_no']);
            $table->timestamps();
            $table->foreign('poll_option_no')->references('poll_option_id')->on('poll_options');
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
        Schema::dropIfExists('learner_poll_options');
    }
}
