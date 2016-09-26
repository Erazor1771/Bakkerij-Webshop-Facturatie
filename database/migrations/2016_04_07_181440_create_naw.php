<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNaw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('naw', function (Blueprint $table) {

            // ID's
            $table->increments('id');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users');

            // Fields
            $table->string('firstname');
            $table->string('lastname');
            $table->string('place');
            $table->string('street');
            $table->string('zipcode');
            $table->integer('phonenumber');
            $table->string('email')->unique();

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
        Schema::drop('naw');
    }
}
