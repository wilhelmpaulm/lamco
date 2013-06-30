<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductionRecordsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pr_no')->nullable();
			$table->float('quantity')->nullable();
			$table->string('paper_type')->nullable();
			$table->string('dimension')->nullable();
			$table->string('weight')->nullable();
			$table->string('calliper')->nullable();
			$table->float('price')->nullable();
			$table->string('vendor')->nullable();
			$table->string('warehouse')->nullable();
			$table->string('location')->nullable();
			$table->integer('owner')->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('approved_by')->nullable();
			$table->string('status')->nullable();
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
        Schema::drop('records');
    }

}
