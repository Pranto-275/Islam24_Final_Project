<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeProfileListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_profile_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_profile_id');
            $table->foreignId('meterial_id');
            $table->double('quantity', 20,2)->default(0.00)->nullable();
            $table->foreignId('unit_id');
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
        Schema::dropIfExists('recipe_profile_lists');
    }
}
