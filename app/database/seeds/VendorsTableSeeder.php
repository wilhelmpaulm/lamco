<?php

class VendorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('vendors')->delete();

        $vendors = array(
            ['name'=> 'Captain Planet', 'address'=> '123 Bang St.', 'contacts' => '87458745874', 'description' => ''],
            ['name'=> 'Tree Life', 'address'=> '123 Foo St.', 'contacts' => '78547854785', 'description' => ''],
            ['name'=> 'Leaflets', 'address'=> '123 Var St.', 'contacts' => '214521452145', 'description' => ''],
            ['name'=> 'GrassBlades', 'address'=> '123 Mangahan St.', 'contacts' => '365236523365', 'description' => '']
        );

        // Uncomment the below to run the seeder
         DB::table('vendors')->insert($vendors);
    }

}