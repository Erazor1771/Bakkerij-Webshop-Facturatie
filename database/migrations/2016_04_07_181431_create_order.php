<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            // ID's
            $table->increments('id');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users');

            // Fields
            $table->enum('order_type', array('standaard', 'brood', 'taart', 'pakket'));
            $table->enum('payment_type', array('ontvangst', 'ideal'));
            $table->longText('products_list');
            $table->decimal('totalprice', 5, 2);
            $table->enum('status', array('nieuw', 'in behandeling', 'afgehandeld'));

            // Timestamps
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
        Schema::drop('orders');
    }
}
