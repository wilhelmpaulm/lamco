<?php

class TrucksTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('trucks')->delete();

        $trucks = array(
            ['name'=> 'Golden Stalion', 'plate' => 'XXX888', 'details' => ''],
            ['name'=> 'Ladys Choice', 'plate' => 'XXX888', 'details' => ''],
            ['name'=> 'Lone Runner', 'plate' => 'XXX888', 'details' => ''],
            ['name'=> 'Outside Bessie', 'plate' => 'XXX888', 'details' => '']
        );

        // Uncomment the below to run the seeder
         DB::table('trucks')->insert($trucks);
    }

}