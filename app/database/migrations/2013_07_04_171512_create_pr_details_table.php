<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pr_details', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('pr_no');
			$table->integer('mq_no')->nullable();
			$table->integer('quantity');
			$table->string('paper_type');
			$table->string('dimension');
			$table->string('weight');
			$table->string('calliper');
			$table->text('instructions')->nullable();
			$table->string('unit')->nullable();
			$table->string('owner')->nullable();
			$table->integer('roll')->nullable();
                        $table->string('warehouse')->nullable();
			$table->string('location')->nullable();
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
        Schema::drop('pr_details');
    }

}
