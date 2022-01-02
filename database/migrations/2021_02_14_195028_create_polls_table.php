<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id('poll_id');
            $table->string('poll_title');
            // $table->datetime('start_date');
            $table->datetime('end_date');
            $table->unsignedBigInteger('cat_no');
            $table->unsignedBigInteger('instr_no');
            $table->foreign('cat_no')->references('cat_id')->on('categories');
            $table->foreign('instr_no')->references('instr_id')->on('instructors');
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
        Schema::dropIfExists('polls');
    }
}
