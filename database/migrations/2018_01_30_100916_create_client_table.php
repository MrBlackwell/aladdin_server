<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone', 11);
            $table->string('email', 50);
            $table->string('password', 100)->nullable();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->rememberToken();
            $table->string('token', 255)->nullable();
            $table->timestamp('token_until')->nullable();
            $table->string("confirm_code", 6)->nullable();
            $table->string('email_code', 6)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
