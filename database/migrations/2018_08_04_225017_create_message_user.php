<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create(
            'message_user', function (Blueprint $table) {

                $table->increments('id');

                $table->enum('status', ['queued', 'sent', 'viewed', 'failed']);

                $table->text('status_message');

                $table->integer('message_id')->unsigned()->after('id');
                $table->foreign('message_id')->references('id')->on('messages');

                $table->integer('user_id')->unsigned()->after('id');
                $table->foreign('user_id')->references('uid')->on('user');

                $table->timestamps();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_user');
    }
}
