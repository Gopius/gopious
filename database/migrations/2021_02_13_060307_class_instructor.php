<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassInstructor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('classes_instructors', function (Blueprint $table) {
            
            $table->unsignedBigInteger('cat_no');
            $table->unsignedBigInteger('instr_no');
            $table->unique(['cat_no','instr_no']);
            $table->timestamps();
            $table->foreign('cat_no')->references('cat_id')->on('categories');
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
        Schema::dropIfExists('classes_instructors');
    }
}
