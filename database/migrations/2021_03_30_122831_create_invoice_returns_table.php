<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_returns', function (Blueprint $table) {
            $table->id();
            // $table->date('date');
            // $table->foreignId('invoice_id');
            // $table->foreignId('unit_id')->nullable();
            // $table->double('quantity',20,4);
            // $table->string('note')->nullable();
            // $table->foreignId('user_id');
            // $table->foreignId('branch_id');
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
        Schema::dropIfExists('invoice_returns');
    }
}
