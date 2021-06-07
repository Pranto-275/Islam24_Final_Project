<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Sale', 'Purchase', 'Estimate']);
            $table->string('date');
            $table->string('code', 100);
            $table->string('token_no', 100)->nullable();
            $table->foreignId('contact_id');
            $table->foreignId('table_id')->nullable();
            $table->foreignId('waiter_id')->nullable();
            $table->double('subtotal', 20, 4);
            $table->foreignId('vat_id')->nullable();
            $table->double('discount', 20, 4)->nullable();
            $table->double('shipping_charge', 20, 4)->nullable();
            $table->double('grand_total', 20, 4)->nullable();
            $table->double('paid_amount', 20, 4)->nullable();
            $table->double('due', 20, 4)->nullable();
            $table->string('earn_point', 100)->nullable();
            $table->double('earn_point_amount', 20, 2)->nullable();
            $table->string('expense_point', 100)->nullable();
            $table->double('expense_point_amount', 20, 2)->nullable();
            $table->string('note')->nullable();
            $table->enum('status', ['Complete', 'Parking', 'Hold', 'Cancel']);
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
        Schema::dropIfExists('invoices');
    }
}
