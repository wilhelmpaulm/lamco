<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('po_details', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('po_no');
                    $table->integer('quantity');
                    $table->string('paper_type');
                    $table->string('dimension');
                    $table->string('weight');
                    $table->string('calliper');
                    $table->string('unit')->nullable();
                    $table->decimal('total', 30,2)->nullable();
                    $table->decimal('price', 30,2)->nullable();
                    $table->text('instructions')->nullable();
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('po_details');
    }

}
