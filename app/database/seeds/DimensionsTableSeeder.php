<?php

class DimensionsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('dimensions')->delete();

        $dimensions = array(
            ['dimension' => '10 x 10'],
            ['dimension' => '15 x 15'],
            ['dimension' => '20 x 20'],
            ['dimension' => '25 x 25'],
            ['dimension' => '30 x 30'],
        );

        // Uncomment the below to run the seeder
         DB::table('dimensions')->insert($dimensions);
    }

}