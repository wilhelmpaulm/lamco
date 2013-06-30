<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecievingReportsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('rr_no')->nullable();
            $table->integer('po_no')->nullable();
            $table->float('quantity');
            $table->string('paper_type')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();
            $table->string('calliper')->nullable();
            $table->text('instructions')->nullable();
            $table->integer('vendor')->nullable();
            $table->integer('approved_by')->nullable();
            $table->integer('recieved_by')->nullable();
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
        Schema::drop('reports');
    }

}
