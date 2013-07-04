<?php

class ClientsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('clients')->delete();

        $clients = array(
            ['name' => 'Wilhelm Corp', 'address' => '123 Asawa St. Manila, City', 'contacts' => '09279655572', 'description' => ''],
            ['name' => 'Edward Traders', 'address' => '123 Ni Mari St. Manila, City', 'contacts' => '09274925988', 'description' => ''],
            ['name' => 'Kier Gaming', 'address' => '123 Araw St. Manila, City', 'contacts' => '5613793', 'description' => ''],
            ['name' => 'Basic Bradley', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Soshi Systems', 'address' => '123 Walang St. Manila, City', 'contacts' => '5795745', 'description' => '']
        );

        // Uncomment the below to run the seeder
         DB::table('clients')->insert($clients);
    }

}