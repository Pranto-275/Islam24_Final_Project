<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->nullable();
            $table->foreignId('category_id');
            $table->foreignId('product_id');
            $table->double('quantity', 20,2)->default(0.00)->nullable();
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
        Schema::dropIfExists('recipe_profiles');
    }
}
