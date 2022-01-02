<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlockLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_learners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('block_no');
            $table->unsignedBigInteger('learner_no');
            $table->unique(['block_no','learner_no']);
            $table->tinyInteger('viewed')->default(0);
            $table->timestamps();
            $table->foreign('block_no')->references('block_id')->on('blocks');
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
        Schema::dropIfExists('block_learners');
    }
}
