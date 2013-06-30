<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('po_no')->nullable();
			$table->float('quantity');
			$table->string('paper_type')->nullable();
			$table->string('dimensions')->nullable();
			$table->string('weight')->nullable();
			$table->string('calliper')->nullable();
			$table->text('instructions')->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('approved_by')->nullable();
			$table->integer('vendor')->nullable();
			$table->float('total')->nullable();
			$table->string('status')->nullable();
			$table->float('price')->nullable();
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
        Schema::drop('orders');
    }

}
