<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('theme')->default(0);
            $table->string('color')->nullable();
            $table->text('css')->nullable();
            $table->text('js')->nullable();
            $table->string('domain_name')->unique();
            $table->unsignedBigInteger('org_no')->unique();
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
        Schema::dropIfExists('settings');
    }
}
