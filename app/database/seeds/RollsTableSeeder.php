<?php

class RollsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('rolls')->delete();

        $rolls = array(
        	['paper_type' => 'Bond Paper', 'quantity' => '50', 'unit' => 'pcs', 'dimension' => '8 X 11', 'weight' => '80 gsm', 'calliper' => '70 cal', 'supplier' => 'Bataan 2020', 'warehouse' => 'A', 'location' => 'A - 2', 'owner' => 'lamco', 'comments' => ''],
        	['paper_type' => 'Kraft Paper', 'quantity' => '150', 'unit' => 'pcs', 'dimension' => '10 X 15', 'weight' => '70 gsm', 'calliper' => '40 cal', 'supplier' => 'Noahs Paper Mill', 'warehouse' => 'B', 'location' => 'B- 2', 'owner' => 'lamco', 'comments' => ''],
        	['paper_type' => 'Coated Paper', 'quantity' => '250', 'unit' => 'pcs', 'dimension' => '9 X 12', 'weight' => '65 gsm', 'calliper' => '60 cal', 'supplier' => 'Stora Enzo', 'warehouse' => 'D', 'location' => 'A - 2', 'owner' => 'lamco', 'comments' => ''],
        	['paper_type' => 'Carbonless Paper', 'quantity' => '100', 'unit' => 'pcs', 'dimension' => '8 X 11', 'weight' => '90 gsm', 'calliper' => '70 cal', 'supplier' => 'Meadwestvaco Corporation', 'warehouse' => 'C','location' => 'C- 2', 'owner' => 'lamco','comments' => ''],
        	['paper_type' => 'Bond Paper', 'quantity' => '50', 'unit' => 'pcs', 'dimension' => '8 X 10', 'weight' => '78 gsm', 'calliper' => '90 cal', 'supplier' => 'OJI Paper', 'warehouse' => 'A', 'location' => 'A - 2', 'owner' => 'lamco', 'comments' => '']

        	);
        // Uncomment the below to run the seeder
        DB::table('rolls')->insert($rolls);
    }

}