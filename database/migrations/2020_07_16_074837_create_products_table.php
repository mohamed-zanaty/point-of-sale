<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('image')->default('product.png');
            $table->boolean('featured')->default(0);
            $table->double('purchase_price', 14, 2);
            $table->double('sale_price', 14, 2);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
