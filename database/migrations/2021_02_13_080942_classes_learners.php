<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassesLearners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('classes_learners', function (Blueprint $table) {
            
            $table->unsignedBigInteger('cat_no');
            $table->unsignedBigInteger('learner_no');
            $table->timestamps();
            $table->foreign('cat_no')->references('cat_id')->on('categories');
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
        Schema::dropIfExists('classes_learners');
    }
}
