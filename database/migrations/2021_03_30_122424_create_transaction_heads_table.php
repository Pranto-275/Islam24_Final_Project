<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_heads', function (Blueprint $table) {
            $table->id();
            $table->string('code',100);
            $table->string('name',100)->nullable();
            $table->enum('type', ['Debit', 'Credit']);
            $table->enum('status', ['Active', 'Inactive']);
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
        Schema::dropIfExists('transaction_heads');
    }
}
