<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicedetilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicedetils', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('invoice_id');
            $table->integer('cat_id');
            $table->integer('product_id');
            $table->integer('selling_price');
            $table->integer('unit_price');
            $table->double('selling_qty');
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('invoicedetils');
    }
}
