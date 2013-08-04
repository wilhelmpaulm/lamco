<?php

class Job_titlesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('job_titles')->delete();

        $job_titles = array(
            ['job_title' => 'staff'],
            ['job_title' => 'manager']
//            ['job_title' => 'Billing Staff'],
//            ['job_title' => 'Cutter Operator'],
//            ['job_title' => 'Die-cutter Operator'],
//            ['job_title' => 'Driver'],
//            ['job_title' => 'General Manager'],
//            ['job_title' => 'Helper'],
//            ['job_title' => 'Importation Supervisor'],
//            ['job_title' => 'Machine Scheduler'],
//            ['job_title' => 'Plant Manager'],
//            ['job_title' => 'President'],
//            ['job_title' => 'Production Supervisor'],
//            ['job_title' => 'In-house Sales'],
//            ['job_title' => 'Sheeter Operator'],
//            ['job_title' => 'Slitter Operator'],
//            ['job_title' => 'Vice President'],
//            ['job_title' => 'Warehouse Head']
        );

        // Uncomment the below to run the seeder
         DB::table('job_titles')->insert($job_titles);
    }

}