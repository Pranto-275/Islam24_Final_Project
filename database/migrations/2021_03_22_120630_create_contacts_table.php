<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('id');
            $table->string('code', 100)->nullable();
			$table->enum('type', ['Customer', 'Supplier','Staff']);
			$table->string('name', 100)->nullable();
			$table->string('business_name', 100)->nullable();
			$table->text('address')->nullable();
            $table->string('email', 191)->nullable();
			$table->string('mobile', 100)->nullable();
            $table->string('sale_commission', 100)->nullable();
			$table->tinyInteger('is_default')->nullable();
			$table->string('credit_limit', 100)->nullable();
			$table->date('due_date')->nullable();
			$table->double('opening_balance', 10,2)->default(0.00)->nullable();
            $table->enum('status', ['Active','Inactive']);
            $table->foreignId('user_id');
			$table->foreignId('branch_id')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
