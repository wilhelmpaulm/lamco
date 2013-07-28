<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDqDetailsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('dq_details', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('dq_no')->nullable();
                    $table->integer('so_no')->nullable();
                    $table->integer('si_no')->nullable();
                    $table->text('destination')->nullable();
                    $table->string('left_at')->nullable();
                    $table->string('arrived_at')->nullable();
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
        Schema::drop('dq_details');
    }

}
