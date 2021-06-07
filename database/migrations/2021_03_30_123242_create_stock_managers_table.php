<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_managers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('code', 100);
            $table->enum('type', ['In', 'Out']);
            $table->foreignId('contact_id');
            $table->foreignId('item_id');
            $table->foreignId('unit_id');
            $table->foreignId('invoice_id')->nullable();
            $table->foreignId('make_product_id')->nullable();
            $table->foreignId('receipe_id')->nullable();
            $table->foreignId('stock_adjustment_id')->nullable();
            $table->double('quantity', 20, 4);
            $table->double('purchase_price', 20, 4)->nullable();
            $table->double('purchase_subtotal', 20, 4)->nullable();
            $table->double('sale_price', 20, 4)->nullable();
            $table->foreignId('vat_id')->nullable();
            $table->double('vat_subtotal', 20, 4)->nullable();
            $table->double('sale_subtotal', 20, 4)->nullable();
            $table->foreignId('user_id');
            $table->foreignId('branch_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_managers');
    }
}
