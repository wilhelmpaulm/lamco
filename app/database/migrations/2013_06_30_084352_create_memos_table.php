<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('memos', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('created_by');
                    $table->date('deadline')->nullable();
                    $table->text('memo')->nullable();
                    $table->string('importance')->nullable();
                    $table->string('department')->nullable();
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('memos');
    }

}
