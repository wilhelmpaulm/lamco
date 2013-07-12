<?php

class MachinesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('machines')->delete();

        $machines = array(
            ['name'=> 'Slitter 1', 'type' => 'slitting'],
            ['name'=> 'Slitter 2', 'type' => 'slitting'],
            ['name'=> 'Slitter 3', 'type' => 'slitting'],
            ['name'=> 'Slitter 4', 'type' => 'slitting'],
            ['name'=> 'Greatwall 3', 'type' => 'sheeting'],
            ['name'=> 'Greatwall 4', 'type' => 'sheeting'],
            ['name'=> 'Greatwall 5', 'type' => 'sheeting'],
            ['name'=> 'Greatwall 6', 'type' => 'sheeting'],
            ['name'=> 'Shin Chin 1', 'type' => 'sheeting'],
            ['name'=> 'Shin Chin 2', 'type' => 'sheeting'],
            ['name'=> 'Shin Chin 3', 'type' => 'sheeting'],
            ['name'=> 'Shin Chin 4', 'type' => 'sheeting'],
            ['name'=> 'Shin Chin 5', 'type' => 'sheeting'],
            ['name'=> 'Japan 1', 'type' => 'sheeting'],
            ['name'=> 'Japan 2', 'type' => 'sheeting'],
            ['name'=> 'Japan 3', 'type' => 'sheeting'],
            ['name'=> 'Japan 4', 'type' => 'sheeting'],
            ['name'=> 'US', 'type' => 'sheeting'],
            ['name'=> 'Lexus 1', 'type' => 'sheeting'],
            ['name'=> 'Ruling Machine', 'type' => 'sheeting'],
            ['name'=> 'Chungta 1', 'type' => 'cutting'],
            ['name'=> 'Chungta 2', 'type' => 'cutting'],
            ['name'=> 'Chungta 3', 'type' => 'cutting'],
            ['name'=> 'Chungta 4', 'type' => 'cutting'],
            ['name'=> 'Perfecta 1', 'type' => 'cutting'],
            ['name'=> 'Perfecta 2', 'type' => 'cutting'],
            ['name'=> 'Wohlenberg 3', 'type' => 'cutting'],
            ['name'=> 'Wohlenberg 4', 'type' => 'cutting'],
            ['name'=> 'Datien', 'type' => 'cutting'],
            ['name'=> 'Polar', 'type' => 'cutting'],
            ['name'=> 'Schneider', 'type' => 'cutting'],
            ['name'=> 'Feida', 'type' => 'cutting'],
            ['name'=> 'Slitter 1', 'type' => 'cutting'],
            ['name'=> 'Diecut 1', 'type' => 'die-cutting'],
            ['name'=> 'Diecut 2', 'type' => 'die-cutting'],
            ['name'=> 'Diecut 3', 'type' => 'die-cutting'],
            ['name'=> 'Diecut 4', 'type' => 'die-cutting'],
            ['name'=> 'Bobst Diecut Machine', 'type' => 'die-cutting']
            
        );

        // Uncomment the below to run the seeder
         DB::table('machines')->insert($machines);
    }

}