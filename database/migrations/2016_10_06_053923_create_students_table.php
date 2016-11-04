<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function(Blueprint $table){
            $table->increments('id');
            $table->string('admin_number')->unique();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 255);
            $table->string('email', 255)->unique()->nullable();
            $table->enum('sex', ['Male', 'Female']);
            $table->enum('religion', ['Christianity', 'Islam', 'Others']);
            $table->date('dob');
            $table->date('date_graduated')->nullable();
            $table->date('date_admitted');
            $table->string('phone')->unique()->nullable();
            $table->string('address');
            $table->string('image', 255)->nullable()->unique();
            $table->text('comment')->nullable();
            $table->enum('status', ["active", "promoting", "promoted", "repeating", 'repeated', "left", "dismissed". "graduated", 'deactivated'])->default('active');
            $table->unsignedInteger('classroom_id');
            $table->unsignedInteger('house_id');
            $table->unsignedInteger('state_id');
            $table->unsignedInteger('lga_id');
            $table->unsignedInteger('guardian_id');
            $table->unsignedInteger('country_id');
            $table->unsignedInteger('previous_classroom_id')->nullable();
            $table->unsignedInteger('starting_classroom_id');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->foreign('previous_classroom_id')->references('id')->on('classrooms');
            $table->foreign('starting_classroom_id')->references('id')->on('classrooms');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('lga_id')->references('id')->on('lgas');
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::table('students', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['state_id']);
            $table->dropForeign(['lga_id']);
            $table->dropForeign(['house_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['previous_classroom_id']);
            $table->dropForeign(['starting_classroom_id']);
        });
        Schema::drop('students');
    }
}
