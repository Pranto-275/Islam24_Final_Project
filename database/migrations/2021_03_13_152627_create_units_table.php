<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
			$table->string('code', 100)->nullable();
			$table->string('name', 100)->nullable();
			$table->double('rate', 20,4)->nullable();
            $table->enum('status', ['Active', 'Inactive']);
			$table->foreignId('user_id');
			$table->foreignId('branch_id');
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
        Schema::dropIfExists('units');
    }
}
