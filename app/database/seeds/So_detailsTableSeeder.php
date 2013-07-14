<?php

class So_detailsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('so_details')->delete();

        $so_details = array(

        );

        // Uncomment the below to run the seeder
        // DB::table('so_details')->insert($so_details);
    }

}