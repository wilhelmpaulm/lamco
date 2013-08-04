<?php

class Sales_invoicesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('sales_invoices')->delete();

        $sales_invoices = array(

        );

        // Uncomment the below to run the seeder
         DB::table('sales_invoices')->insert($sales_invoices);
    }

}