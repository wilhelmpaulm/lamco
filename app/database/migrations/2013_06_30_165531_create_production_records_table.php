<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductionRecordsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('production_records', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('so_no')->nullable();
                    $table->integer('mq_no')->nullable();
                    $table->integer('si_d')->nullable();
                    $table->integer('so_d')->nullable();
//			$table->float('quantity')->nullable();
//			$table->string('dimension')->nullable();
//			$table->string('weight')->nullable();
//			$table->string('calliper')->nullable();
//			$table->float('price')->nullable();
//			$table->string('vendor')->nullable();
//			$table->string('warehouse')->nullable();
//			$table->string('location')->nullable();
//			$table->integer('owner')->nullable();
                    $table->string('production_type')->nullable();
                    $table->integer('checker_a')->nullable();
                    $table->integer('checker_b')->nullable();
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
    public function down() {
        Schema::drop('production_records');
    }

}
