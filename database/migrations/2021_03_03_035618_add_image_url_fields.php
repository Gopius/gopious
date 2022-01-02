<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageUrlFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
             $table->string('org_avatar_url')->default('');
             $table->string('org_long_icon_url')->default('');
             $table->string('org_square_icon_url')->default('');
        });
        Schema::table('instructors', function (Blueprint $table) {
             $table->string('instr_avatar_url')->default('');
        });
        Schema::table('learners', function (Blueprint $table) {
             $table->string('learner_avatar_url')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropColumn('org_avatar_url');
            $table->dropColumn('org_long_icon_url');
            $table->dropColumn('org_square_icon_url');
        });
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropColumn('instr_avatar_url');
        });
        Schema::table('learners', function (Blueprint $table) {
            $table->dropColumn('learner_avatar_url');
        });
    }
}
