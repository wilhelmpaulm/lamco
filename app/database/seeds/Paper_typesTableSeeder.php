<?php

class Paper_typesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('paper_types')->delete();

        $paper_types = array(
            ['type' => 'bond'],
            ['type' => 'recycled'],
            ['type' => 'virgin'],
            ['type' => 'matte'],
            ['type' => 'vinyln']
        );

        // Uncomment the below to run the seeder
         DB::table('paper_types')->insert($paper_types);
    }

}