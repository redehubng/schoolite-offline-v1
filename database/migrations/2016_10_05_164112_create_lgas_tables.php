<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLgasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lgas', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('state_id');
            $table->boolean('is_capital')->default(false);
            $table->foreign('state_id')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lgas', function(Blueprint $table){
            $table->dropForeign(['state_id']);
        });
        Schema::drop('lgas');
    }
}
