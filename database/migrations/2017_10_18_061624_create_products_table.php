<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'category_id');
            $table->integer( 'brand_id');
            $table->string( 'product_name');
            $table->text( 'short_description');
            $table->text( 'long_description');
            $table->string( 'product_code');
            $table->integer( 'product_price');
            $table->integer( 'product_quantity');
            $table->tinyInteger( 'publication_status');
            $table->string( 'product_image',100);
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
        Schema::dropIfExists('products');
    }
}
