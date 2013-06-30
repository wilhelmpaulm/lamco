<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryQueueasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queueas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('dq_no')->nullable();
			$table->integer('truck')->nullable();
			$table->integer('driver')->nullable();
			$table->integer('client')->nullable();
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
        Schema::drop('queueas');
    }

}
