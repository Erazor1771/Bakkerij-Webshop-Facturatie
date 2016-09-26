<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {
            // ID's
            $table->increments('id');
            $table->string('categories', 1000);
            $table->string('name');

            // Fields
            $table->enum('type', array('standaard', 'brood', 'taart', 'pakket'));
            $table->decimal('price', 5, 2);
            $table->longText('details');
            $table->integer('rating')->unsigned();
            $table->string('availability');
            $table->string('warning');
            $table->string('path');

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
        Schema::drop('products');
    }
}
