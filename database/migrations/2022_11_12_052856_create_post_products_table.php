<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('product_id');

            $table->index('product_id','post_product_product_idx');
            $table->index('post_id','post_product_post_idx');


            $table->foreign('product_id','post_product_product_fk')->on('products')->references('id');
            $table->foreign('post_id','post_product_post_fk')->on('posts')->references('id');


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
        Schema::dropIfExists('post_products');
    }
};
