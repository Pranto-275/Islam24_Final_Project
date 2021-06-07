<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            // $table->foreignId('brand_id');
            $table->enum('item_type', ['Product', 'Material']);
			$table->string('code', 100)->nullable();
			$table->string('name', 100)->nullable();
            $table->foreignId('unit_id');
            $table->double('purchase_price', 20,2)->default(0.00)->nullable();
            $table->double('avg_pur_price', 20,2)->default(0.00)->nullable();
            $table->double('opening_stock', 20,2)->default(0.00)->nullable();
            $table->foreignId('vat_id')->nullable();
            $table->double('discount')->default(0.00)->nullable();
            $table->double('sale_price', 20,2)->default(0.00)->nullable();
            $table->double('low_stock_alert', 20,2)->default(0.00)->nullable();
            $table->string('is_stock_check', 100)->nullable();
            $table->string('image', 100)->nullable();
			$table->foreignId('user_id');
            $table->foreignId('branch_id');
            $table->enum('status', ['Active','Inactive']);
			$table->softDeletes();
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
        Schema::dropIfExists('items');
    }
}
