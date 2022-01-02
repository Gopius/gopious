<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learners', function (Blueprint $table) {
            $table->id("learner_id");
            $table->string('learner_name');
            $table->string('learner_email');
            $table->string('learner_phone');
            $table->string('learner_status')->default(0);
            $table->unsignedBigInteger('org_no');
            $table->timestamps();
            $table->foreign('org_no')->references('org_id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learners');
    }
}
