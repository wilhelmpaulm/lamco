<?php

class Job_titlesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('job_titles')->delete();

        $job_titles = array(
            ['job_title' => 'manager'],
            ['job_title' => 'staff']
        );

        // Uncomment the below to run the seeder
         DB::table('job_titles')->insert($job_titles);
    }

}