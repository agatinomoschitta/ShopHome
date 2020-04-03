<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('contactNumber', 255);
            $table->string('orderID', 255);
            $table->text('address');          
            $table->text('country');
            $table->text('city');
            $table->text('state');
            $table->float('amount');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            
            $table->primary(array('contactNumber', 'orderID'));
            $table->index('contactNumber');
            $table->foreign('contactNumber')->references('contactNumber')->on('users');
            
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
