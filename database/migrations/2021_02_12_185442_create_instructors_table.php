<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id("instr_id");
            $table->string('instr_name');
            $table->string('instr_email');
            $table->string('instr_phone');
            $table->string('instr_status')->default(0);
            $table->unsignedBigInteger('org_no');
            $table->timestamps();
            $table->string('open_password')->default('password');
            $table->string('password')->default('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
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
        Schema::dropIfExists('instructors');
    }
}
