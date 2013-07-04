<?php

class WarehousesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('warehouses')->delete();

        $warehouses = array(
            ['warehouse' => 'A'],
            ['warehouse' => 'B'],
            ['warehouse' => 'C'],
            ['warehouse' => 'D'],
            ['warehouse' => 'E']
        );

        // Uncomment the below to run the seeder
         DB::table('warehouses')->insert($warehouses);
    }

}