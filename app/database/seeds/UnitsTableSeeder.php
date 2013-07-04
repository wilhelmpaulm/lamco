<?php

class UnitsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('units')->delete();

        $units = array(
            ['unit' => 'sheets'],
            ['unit' => 'bales'],
            ['unit' => 'reams'],
            ['unit' => 'bundles'],
            ['unit' => 'quires']
        );

        // Uncomment the below to run the seeder
         DB::table('units')->insert($units);
    }

}