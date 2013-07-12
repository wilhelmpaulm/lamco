<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRollsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolls', function(Blueprint $table) {
            $table->increments('id');
            $table->string('paper_type')->nullable();
			$table->float('quantity')->nullable();
			$table->string('unit')->nullable();
			$table->string('dimension')->nullable();
			$table->string('weight')->nullable();
			$table->string('calliper')->nullable();
			$table->string('supplier')->nullable();
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
        Schema::drop('rolls');
    }

}
