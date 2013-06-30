<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('so_no')->nullable();
			$table->integer('product')->nullable();
			$table->integer('roll')->nullable();
			$table->float('quantity')->nullable();
			$table->string('paper_type')->nullable();
			$table->string('dimension')->nullable();
			$table->string('weight')->nullable();
			$table->string('calliper')->nullable();
			$table->text('instructions')->nullable();
			$table->integer('client')->nullable();
			$table->string('terms')->nullable();
			$table->string('transaction_type')->nullable();
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
        Schema::drop('orders');
    }

}
