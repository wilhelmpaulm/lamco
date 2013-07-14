<?php

class Receiving_reportsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('receiving_reports')->delete();

        $recieving_reports = array(

        );

        // Uncomment the below to run the seeder
//         DB::table('receiving_reports')->insert($receiving_reports);
    }

}