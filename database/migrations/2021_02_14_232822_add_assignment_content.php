<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssignmentContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->text('ass_content');
            $table->dateTimeTz('end_date');
            $table->unsignedBigInteger('instr_no');
            $table->foreign('instr_no')->references('instr_id')->on('instructors');
        });
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dateTimeTz('start_date');
            $table->dateTimeTz('end_date');
            $table->unsignedBigInteger('instr_no');
            $table->foreign('instr_no')->references('instr_id')->on('instructors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropColumn('ass_content');
            $table->dropColumn('end_date');
            $table->dropForeign('assignments_instr_no_foreign');
            $table->dropColumn('instr_no');
        });
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropForeign('quizzes_instr_no_foreign');
            $table->dropColumn('instr_no');
        });
    }
}
