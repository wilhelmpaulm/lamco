<?php

class MachinesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('machines')->delete();

        $machines = array(
            ['name'=> 'Honda Slice', 'type' => 'cutting'],
            ['name'=> 'Toilet Sheetres', 'type' => 'sheeting'],
            ['name'=> 'Casino Dicer', 'type' => 'die cutting']
        );

        // Uncomment the below to run the seeder
         DB::table('machines')->insert($machines);
    }

}