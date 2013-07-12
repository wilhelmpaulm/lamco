<?php

class DepartmentsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('departments')->delete();

        $departments = array(
            ['code' => 'SAL','department' => 'Sales' ],
            ['code' => 'BIL','department' => 'Billing' ],
            ['code' => 'IMP','department' => 'Importation' ],
            ['code' => 'PRD','department' => 'Production' ],
            ['code' => 'WRH','department' => 'Warehousing' ],
            ['code' => 'MGT','department' => 'Management' ],
            ['code' => 'ADM','department' => 'Admin' ]
        );

        // Uncomment the below to run the seeder
         DB::table('departments')->insert($departments);
    }

}