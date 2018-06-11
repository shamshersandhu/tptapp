<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('add11');
            $table->string('add12');
            $table->string('add21');
            $table->string('add22');
            $table->string('type');
            $table->string('dl_num');
            $table->string('dl_state');
            $table->date('dl_exp');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('email');
            $table->string('notes');
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
        Schema::dropIfExists('contacts');
    }
}
