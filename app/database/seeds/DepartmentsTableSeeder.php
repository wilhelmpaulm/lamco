<?php

class DepartmentsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('departments')->delete();

        $departments = array(
            ['code' => 'SAL','department' => 'Sales' ],
            ['code' => 'BIL','department' => 'Billing' ],
            ['code' => 'PRD','department' => 'Production' ],
            ['code' => 'PUR','department' => 'Purchasing' ],
            ['code' => 'DLV','department' => 'Delivery' ],
            ['code' => 'ADM','department' => 'Admin' ],
            ['code' => 'WAR','department' => 'Warehousing' ],
            ['code' => 'MGT','department' => 'Management' ]
        );

        // Uncomment the below to run the seeder
         DB::table('departments')->insert($departments);
    }

}