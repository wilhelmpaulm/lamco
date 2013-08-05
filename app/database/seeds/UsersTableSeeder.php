<?php

class UsersTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();

        $users = array(
            ['id' => '109301', "last_name" => "fernandez", "first_name" => "wilhelm", "password" => Hash::make("pawie2062"), "department" => "purchasing", "job_title" => "manager"],
            ['id' => '109302', "last_name" => "martinez", "first_name" => "edward", "password" => Hash::make("pawie2062"), "department" => "sales", "job_title" => "manager"],
            ['id' => '109303', "last_name" => "kau", "first_name" => "janine", "password" => Hash::make("pawie2062"), "department" => "production", "job_title" => "manager"],
            ['id' => '109304', "last_name" => "untalan", "first_name" => "kier", "password" => Hash::make("pawie2062"), "department" => "billing", "job_title" => "manager"],
            ['id' => '109305', "last_name" => "espenesin", "first_name" => "espenesin", "password" => Hash::make("pawie2062"), "department" => "delivery", "job_title" => "manager"],
            ['id' => '109306', "last_name" => "martinez", "first_name" => "wilhelm", "password" => Hash::make("pawie2062"), "department" => "admin", "job_title" => "staff"],
            ['id' => '109307', "last_name" => "kenny", "first_name" => "rogers", "password" => Hash::make("pawie2062"), "department" => "warehousing", "job_title" => "staff"],
            ['id' => '109308', "last_name" => "mcdonald", "first_name" => "ronald", "password" => Hash::make("pawie2062"), "department" => "management", "job_title" => "manager"]
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}