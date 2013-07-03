<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('users')->delete();

        $users = array(
            ["last_name" => "martinez", "first_name" => "martinez", "password" => Hash::make("pawie2062"), "department" => "admin", "job_title" => "CEO" ]
        );

        // Uncomment the below to run the seeder
         DB::table('users')->insert($users);
    }

}