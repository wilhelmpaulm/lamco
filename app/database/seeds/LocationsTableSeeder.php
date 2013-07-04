<?php

class LocationsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('locations')->delete();

        $locations = array(
            ['location' => 'A-1'],
            ['location' => 'A-2'],
            ['location' => 'A-3'],
            ['location' => 'A-4'],
            ['location' => 'A-5'],
            ['location' => 'B-1'],
            ['location' => 'B-2'],
            ['location' => 'B-3'],
            ['location' => 'B-4'],
            ['location' => 'B-5'],
            ['location' => 'C-1'],
            ['location' => 'C-2'],
            ['location' => 'C-3'],
            ['location' => 'C-4'],
            ['location' => 'C-5'],
        );

        // Uncomment the below to run the seeder
         DB::table('locations')->insert($locations);
    }

}