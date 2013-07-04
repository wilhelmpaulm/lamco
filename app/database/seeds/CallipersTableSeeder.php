<?php

class CallipersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('callipers')->delete();

        $callipers = array(
            ['calliper' => '5 mm'],
            ['calliper' => '10 mm'],
            ['calliper' => '15 mm'],
            ['calliper' => '20 mm'],
            ['calliper' => '25 mm'],
            ['calliper' => '30 mm']
        );

        // Uncomment the below to run the seeder
         DB::table('callipers')->insert($callipers);
    }

}