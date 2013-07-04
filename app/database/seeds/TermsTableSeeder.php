<?php

class TermsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('terms')->delete();

        $terms = array(
            ['term' => '15 days'],
            ['term' => '30 days'],
            ['term' => '60 days'],
            ['term' => '90 days']
        );

        // Uncomment the below to run the seeder
         DB::table('terms')->insert($terms);
    }

}