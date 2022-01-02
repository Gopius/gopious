<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id("cat_id");
            $table->string('cat_title');
            $table->string('cat_desc');
            $table->string('cat_code', 6)->unique();
            $table->string('cat_max_student');
            $table->string('cat_status');
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
        Schema::dropIfExists('categories');
    }
}
