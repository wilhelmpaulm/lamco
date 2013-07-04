<?php

class Machine_typesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('machine_types')->delete();

        $machine_types = array(
            ['type' => 'cutting'],
            ['type' => 'slitting'],
            ['type' => 'sheeting'],
            ['type' => 'die cutting']
        );

        // Uncomment the below to run the seeder
         DB::table('machine_types')->insert($machine_types);
    }

}