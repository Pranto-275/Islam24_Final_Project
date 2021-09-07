<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_languages', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('sign_up');
            $table->string('sign_in');
            $table->string('new_product');
            $table->string('best_selling_product');
            $table->string('home');
            $table->string('product_categories');
            $table->string('shop_page');
            $table->string('complain_or_opinion');
            $table->string('communication');
            $table->string('return_policy');
            $table->string('contact_us');
            $table->string('privacy_policy');
            $table->string('terms_and_condition');
            $table->string('about_us');
            $table->string('mission_and_vision');
            $table->string('my_account');
            $table->string('shopping_cart');
            $table->string('checkout');
            $table->string('menu');
            $table->string('product_search');
            $table->string('beaking_news');
            $table->string('total_amount');
            $table->string('more_categories');
            $table->string('more_products');
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
        Schema::dropIfExists('multi_languages');
    }
}
