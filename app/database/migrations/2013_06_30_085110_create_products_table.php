<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('paper_type')->nullable();
			$table->float('quantity')->nullable();
			$table->string('dimension')->nullable();
			$table->string('weight')->nullable();
			$table->string('calliper')->nullable();
			$table->float('price')->nullable();
			$table->string('warehouse')->nullable();
			$table->string('location')->nullable();
			$table->string('owner')->nullable();
			$table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }

}
