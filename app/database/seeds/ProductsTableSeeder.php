<?php

class ProductsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('products')->delete();

        $products = array(
            ['paper_type'=>'bond', 'quantity'=>'888','dimension'=>'15" x 15"','weight'=>'20g','calliper'=>'15mm','price'=>'55555','warehouse'=>'A','location'=>'A-3','owner'=>'lamco','comments'=>''],
            ['paper_type'=>'virgin', 'quantity'=>'888','dimension'=>'15" x 15"','weight'=>'20g','calliper'=>'10mm','price'=>'55555','warehouse'=>'A','location'=>'A-5','owner'=>'lamco','comments'=>''],
            ['paper_type'=>'recycled', 'quantity'=>'999','dimension'=>'15" x 15"','weight'=>'20g','calliper'=>'5mm','price'=>'55555','warehouse'=>'C','location'=>'C-4','owner'=>'lamco','comments'=>''],
            ['paper_type'=>'matte', 'quantity'=>'444','dimension'=>'15" x 15"','weight'=>'20g','calliper'=>'15mm','price'=>'55555','warehouse'=>'A','location'=>'B-2','owner'=>'lamco','comments'=>''],
            ['paper_type'=>'matte', 'quantity'=>'555','dimension'=>'15" x 15"','weight'=>'20g','calliper'=>'20mm','price'=>'55555','warehouse'=>'B','location'=>'C-3','owner'=>'lamco','comments'=>''],
            ['paper_type'=>'bond', 'quantity'=>'222','dimension'=>'15" x 15"','weight'=>'20g','calliper'=>'25mm','price'=>'55555','warehouse'=>'C','location'=>'B-1','owner'=>'lamco','comments'=>'']
        );

        // Uncomment the below to run the seeder
         DB::table('products')->insert($products);
    }

}