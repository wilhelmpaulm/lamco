<?php

class SuppliersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('suppliers')->delete();

        $vendors = array(
            ['name'=> 'Bataan 2020', 'address'=> '123 Bang St.', 'contacts' => '87458745874', 'description' => ''],
            ['name'=> 'Trust International Paper Corporation', 'address'=> '123 Foo St.', 'contacts' => '78547854785', 'description' => ''],
            ['name'=> 'Noahs Paper Mill', 'address'=> '123 Var St.', 'contacts' => '214521452145', 'description' => ''],
            ['name'=> 'Stora Enzo', 'address'=> '123 Mangahan St.', 'contacts' => '365236523365', 'description' => ''],
            ['name'=> 'Meadwestvaco Corporation', 'address'=> '123 Var St.', 'contacts' => '214521452145', 'description' => ''],
            ['name'=> 'OJI Paper', 'address'=> '123 Var St.', 'contacts' => '214521452145', 'description' => '']
        );

        // Uncomment the below to run the seeder
         DB::table('suppliers')->insert($vendors);
    }

}