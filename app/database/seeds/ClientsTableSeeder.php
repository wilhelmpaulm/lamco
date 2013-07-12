<?php

class ClientsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('clients')->delete();

        $clients = array(
            ['name' => 'Vibal Publishing', 'address' => '123 Asawa St. Manila, City', 'contacts' => '09279655572', 'description' => ''],
            ['name' => 'House Printers Corporation', 'address' => '123 Ni Mari St. Manila, City', 'contacts' => '09274925988', 'description' => ''],
            ['name' => 'Metrobank', 'address' => '123 Araw St. Manila, City', 'contacts' => '5613793', 'description' => ''],
            ['name' => 'Silverado Marketing', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Cebu Paper Sales Inc.', 'address' => '123 Walang St. Manila, City', 'contacts' => '5795745', 'description' => ''],
            ['name' => 'Good Team Printing Inc.', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'United Graphics Expression Corporation', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Sterling Bank', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Citiprint Inc.', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'SGV', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Procurement Service DBM', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Cathay Printing', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Unity Printing', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Tanduay Distillers Inc.', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Print Well Inc.', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Phoenix Publishing Corp.', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'SJBS Publishing', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => ''],
            ['name' => 'Fortune Packaging', 'address' => '123 Gabi St. Manila, City', 'contacts' => '3533015', 'description' => '']
        );

        // Uncomment the below to run the seeder
         DB::table('clients')->insert($clients);
    }

}