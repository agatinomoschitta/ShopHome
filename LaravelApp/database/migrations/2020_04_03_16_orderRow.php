<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderRow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderRows', function (Blueprint $table) {
            $table->string('productID', 255);
            $table->string('orderID', 255);
            $table->text('quantity');
            $table->text('amount');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
            $table->primary(array('productID', 'orderID'));
            $table->index('productID');
            $table->index('orderID');
            $table->foreign('productID')->references('code')->on('products');
            $table->foreign('orderID')->references('orderID')->on('orders');
            
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
