<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user')->nullable();
            $table->string('status')->nullable();
            $table->integer('id_message')->nullable();
            $table->longText('response')->nullable();
            $table->timestamps();

            $table->foreign('id_message')->references('id')->on('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
