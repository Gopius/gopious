<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_learners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ass_no');
            $table->unsignedBigInteger('learner_no');
            $table->text('ass_answer');
            $table->unique(['ass_no','learner_no']);
            $table->timestamps();
            $table->foreign('ass_no')->references('ass_id')->on('assignments');
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
        Schema::dropIfExists('assignment_learners');
    }
}
