<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('language')->unique();
            $table->string('sign_up')->nullable();
            $table->string('sign_in')->nullable();
            $table->string('new_product')->nullable();
            $table->string('best_selling_product')->nullable();
            $table->string('home')->nullable();
            $table->string('product_categories')->nullable();
            $table->string('shop_page')->nullable();
            $table->string('complain_or_opinion')->nullable();
            $table->string('communication')->nullable();
            $table->string('return_policy')->nullable();
            $table->string('contact_us')->nullable();
            $table->string('privacy_policy')->nullable();
            $table->string('terms_and_condition')->nullable();
            $table->string('about_us')->nullable();
            $table->string('mission_and_vision')->nullable();
            $table->string('my_account')->nullable();
            $table->string('shopping_cart')->nullable();
            $table->string('checkout')->nullable();
            $table->string('menu')->nullable();
            $table->string('product_search')->nullable();
            $table->string('beaking_news')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('more_categories')->nullable();
            $table->string('more_products')->nullable();
            $table->boolean('is_default')->default(0);
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
        Schema::dropIfExists('languages');
    }
}
