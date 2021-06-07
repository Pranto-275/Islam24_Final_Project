<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
			$table->string('code', 100)->nullable();
			$table->string('name', 100)->nullable();
            $table->foreignId('unit_id');
            $table->double('production_cost', 20,2)->default(0.00)->nullable();
            $table->foreignId('vat_id')->nullable();
            $table->double('sale_price', 20,2)->default(0.00)->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
