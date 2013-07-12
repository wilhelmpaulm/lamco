<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMqDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mq_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('mq_no')->nullable();
			$table->integer('so_no');
			$table->integer('quantity');
			$table->integer('roll')->nullable();
			$table->string('paper_type');
			$table->string('dimension');
			$table->string('weight');
			$table->string('calliper');
			$table->text('instructions')->nullable();
			$table->string('transaction_type')->nullable();
//			$table->integer('client')->nullable();
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
        Schema::drop('mq_details');
    }

}
