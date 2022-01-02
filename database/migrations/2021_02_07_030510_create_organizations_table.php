<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id("org_id");
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('org_name');
            $table->tinyInteger('approved')->default(0);
            $table->unsignedBigInteger('org_type_no');
            $table->string('org_address');
            $table->unsignedBigInteger('state_no');
            $table->string('about_org');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('organizations');
    }
}
