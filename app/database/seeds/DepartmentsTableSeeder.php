<?php

class DepartmentsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('departments')->delete();

        $departments = array(
            ['department' => 'purchasing' ],
            ['department' => 'sales' ],
            ['department' => 'production' ],
            ['department' => 'delivery' ],
            ['department' => 'admin' ]
        );

        // Uncomment the below to run the seeder
         DB::table('departments')->insert($departments);
    }

}