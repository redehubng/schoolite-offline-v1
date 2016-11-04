<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function(Blueprint $table){
            $table->increments('id');
            $table->enum('title', ['Mr', 'Miss', 'Mrs', 'Dr', 'Prof']);
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->unique();
            $table->string('guardian_id')->unique();
            $table->string('address');
            $table->string('occupation');
            $table->string('image')->nullable()->unique();
            $table->enum('sex', ["Male", "Female"]);
            $table->enum('status', ["active", "inactive"])->default('active');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->unsignedInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');

            $table->unsignedInteger('lga_id');
            $table->foreign('lga_id')->references('id')->on('lgas');
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
        Schema::table('guardians', function(Blueprint $table){
            $table->dropForeign(['country_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['lga_id']);
        });
        Schema::drop('guardians');
    }
}
