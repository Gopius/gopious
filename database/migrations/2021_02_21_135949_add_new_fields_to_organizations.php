<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('org_size')->default('');
            $table->string('org_priority')->default('');
            $table->string('org_why')->default('');
            $table->string('org_phone')->nullable();
            $table->string('homepage')->nullable();
            $table->string('website')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
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
            $table->dropColumn('org_size');
            $table->dropColumn('org_priority');
            $table->dropColumn('org_why');
            $table->dropColumn('org_phone');
            $table->dropColumn('homepage');
            $table->dropColumn('website');
            $table->dropColumn('fb');
            $table->dropColumn('twitter');
            $table->dropColumn('linkedin');
        });
    }
}
