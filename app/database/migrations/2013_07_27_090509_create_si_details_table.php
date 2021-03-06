<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('si_details', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('si_no')->nullable();
                    $table->integer('quantity')->nullable();
                    $table->string('unit')->nullable();
                    $table->string('paper_type')->nullable();
                    $table->string('dimension')->nullable();
                    $table->string('weight')->nullable();
                    $table->string('calliper')->nullable();
                    $table->text('instructions')->nullable();
                    $table->decimal('total', 30,2)->nullable();
                    $table->decimal('price', 30,2)->nullable();
                    $table->integer('product')->nullable();
                    $table->integer('roll')->nullable();
                    $table->string('transaction_type')->nullable();
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('si_details');
    }

}
