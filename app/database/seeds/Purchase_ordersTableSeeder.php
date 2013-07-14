<?php

class Purchase_ordersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('purchase_orders')->delete();

        $purchase_orders = array(

        );

        // Uncomment the below to run the seeder
//         DB::table('purchase_orders')->insert($purchase_orders);
    }

}