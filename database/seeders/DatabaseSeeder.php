<?php

namespace Database\Seeders;

use App\Models\OrganizationType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	// \App\Models\OrganizationType::factory(5)->create();
        $org_type_names = [
            ['org_type_name'=>'Pri./Sec. School'],
            ['org_type_name'=>'Higher Institution'],
            ['org_type_name'=>'Corporate'],
            ['org_type_name'=>'Government Institution'],
            ['org_type_name'=>'Start-up'],
            ['org_type_name'=>'Others'],
        ];
        foreach ($org_type_names as $key => $org_type_name) {
            OrganizationType::create($org_type_name);
        }
        \App\Models\Admin::factory(1)->create();
        \App\Models\Organization::factory(1)->create();
        // \App\Models\Category::factory(10)->create();
    }
}
