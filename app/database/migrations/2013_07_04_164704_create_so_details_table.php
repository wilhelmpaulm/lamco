<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSoDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('so_no');
			$table->integer('quantity');
			$table->string('paper_type');
			$table->string('dimension');
			$table->string('weight');
			$table->string('calliper');
			$table->text('instructions')->nullable();
			$table->float('total')->nullable();
			$table->float('price')->nullable();
			$table->integer('product')->nullable();
			$table->integer('roll')->nullable();
			$table->string('transaction_type')->nullable();
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
        Schema::drop('so_details');
    }

}
