<?php

class WeightsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('weights')->delete();

        $weights = array(
            ['weight' => '10Kgs'],
            ['weight' => '15Kgs'],
            ['weight' => '100Kgs'],
            ['weight' => '10g'],
            ['weight' => '15g'],
            ['weight' => '100gs']
        );

        // Uncomment the below to run the seeder
         DB::table('weights')->insert($weights);
    }

}