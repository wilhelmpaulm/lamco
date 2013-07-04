<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('users')->delete();

        $users = array(
            ['id' => '109301',"last_name" => "martinez", "first_name" => "martinez", "password" => Hash::make("pawie2062"), "department" => "purchasing", "job_title" => "CEO" ],
            ['id'=>'109302', "last_name" => "fernandex", "first_name" => "edward", "password" => Hash::make("pawie2062"), "department" => "sales", "job_title" => "CEO" ],
            ['id'=>'109303',"last_name" => "kau", "first_name" => "janine", "password" => Hash::make("pawie2062"), "department" => "production", "job_title" => "CEO" ],
            ['id'=>'109304',"last_name" => "untalan", "first_name" => "kier", "password" => Hash::make("pawie2062"), "department" => "delivery", "job_title" => "CEO" ],
            ['id'=>'109305',"last_name" => "espenesin", "first_name" => "espenesin", "password" => Hash::make("pawie2062"), "department" => "admin", "job_title" => "CEO" ]
        );

        // Uncomment the below to run the seeder
         DB::table('users')->insert($users);
    }

}