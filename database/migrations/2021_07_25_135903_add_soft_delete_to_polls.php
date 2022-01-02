<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToPolls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('quizzes', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('assignments', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
