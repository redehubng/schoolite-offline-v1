<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->double('first_term_charges')->nullable();
            $table->double('second_term_charges')->nullable();
            $table->double('third_term_charges')->nullable();
            $table->unsignedInteger('teacher_id')->nullable();
            $table->unsignedInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::table('classrooms', function(Blueprint $table){
            $table->dropForeign(['level_id']);
            $table->dropForeign(['teacher_id']);
        });
        Schema::drop('classrooms');
    }
}
