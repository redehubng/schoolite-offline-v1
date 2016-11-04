<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function(Blueprint $table){
            $table->increments('id');
            $table->enum('title', ['Mr', 'Miss', 'Mrs', 'Dr', 'Prof']);
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('phone')->unique();
            $table->date('dob');
            $table->date('date_employed');
            $table->date('date_left')->nullable();
            $table->string('staff_id')->unique();
            $table->string('address');
            $table->enum('marital_status', ['Single', 'Married', 'Other']);
            $table->double('salary')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable()->unique();
            $table->enum('sex', ["Male", "Female"]);
            $table->enum('status', ["active", "left", 'sacked', 'resigned', 'death', 'sick', 'others'])->default('active');

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
        Schema::table('teachers', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['lga_id']);
        });
        Schema::drop('teachers');
    }
}
