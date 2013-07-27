<?php

class Si_detailsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('si_details')->delete();

        $si_details = array(

        );

        // Uncomment the below to run the seeder
         DB::table('si_details')->insert($si_details);
    }

}