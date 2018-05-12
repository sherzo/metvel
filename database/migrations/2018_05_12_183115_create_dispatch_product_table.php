<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dispatch_id');
            $table->foreign('dispatch_id')
                ->references('id')
                ->on('dispatches')
                ->onDelete('cascade');

            $table->unsignedInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->index(['dispatch_id', 'product_id']);
            $table->unsignedInteger('quantity');
            $table->unsignedDecimal('amount', 14, 2);
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
        Schema::dropIfExists('dispatch_product');
    }
}
