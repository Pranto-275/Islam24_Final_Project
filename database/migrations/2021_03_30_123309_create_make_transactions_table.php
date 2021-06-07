<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['In', 'Out']);
            $table->foreignId('contact_id');
            $table->double('amount', 20,4)->nullable();
            $table->string('charge', 20,4)->nullable();
            $table->string('net_amount', 20,4)->nullable();
            $table->string('note',500)->nullable();
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
        Schema::dropIfExists('make_transactions');
    }
}
