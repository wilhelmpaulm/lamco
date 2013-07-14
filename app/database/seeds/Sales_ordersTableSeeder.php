<?php

class Sales_ordersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('sales_orders')->delete();

        $sales_orders = array(

        );

        // Uncomment the below to run the seeder
        // DB::table('sales_orders')->insert($sales_orders);
    }

}