<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->double('total_amount')->nullable();
            $table->double('other_amount')->nullable();
            $table->double('discount')->nullable();
            $table->double('shipping_charge')->nullable();
            $table->double('vat')->nullable();
            $table->double('payable_amount')->nullable();
            $table->text('note')->nullable();
            $table->enum('invoice_channel', ['Web-Sale', 'Sale-Terminal'])->comment('Backend Sale or Online Sale');
            $table->foreignId('coupon_code_id')->nullable();
            $table->foreignId('branch_id');
            $table->foreignId('created_by');
            $table->boolean('is_active')->nullable()->default(1);
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
        Schema::dropIfExists('orders');
    }
}
