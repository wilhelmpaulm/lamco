<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMachineQueuesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_queues', function(Blueprint $table) {
            $table->increments('id');
//            $table->integer('pq_no')->nullable();
			$table->integer('si_d')->nullable();
			$table->integer('so_d')->nullable();
			$table->integer('so_no')->nullable();
			$table->integer('machine')->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('approved_by')->nullable();
			$table->string('production_type')->nullable();
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
        Schema::drop('machine_queues');
    }

}
