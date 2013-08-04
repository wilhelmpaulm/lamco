<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesInvoicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sales_invoices', function(Blueprint $table) {
                    $table->increments('id');
                    $table->integer('so_no')->nullable();
                    $table->integer('client')->nullable();
                    $table->string('terms')->nullable();
                    $table->decimal('discount', 30, 2)->nullable();
                    $table->decimal('subtotal', 30, 2)->nullable();
                    $table->decimal('vat', 30, 2)->nullable();
                    $table->decimal('total', 30, 2)->nullable();
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
    public function down() {
        Schema::drop('sales_invoices');
    }

}
