<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixContraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            
            $table->foreign('org_type_no')->references('org_type_id')->on('organization_types');
            $table->foreign('state_no')->references('id')->on('states');
            
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
            $table->dropForeign('organizations_org_type_no_foreign');
            $table->dropForeign('organizations_state_no_foreign');
        });
        // Schema::dropForeign('organizations_org_type_no_foreign');
        // Schema::dropForeign('organizations_state_no_foreign');
    }
}
