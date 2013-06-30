<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductionLogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->nullable();
			$table->string('department')->nullable();
			$table->text('action')->nullable();
			$table->integer('reference')->nullable();
			$table->integer('client')->nullable();
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
        Schema::drop('logs');
    }

}
