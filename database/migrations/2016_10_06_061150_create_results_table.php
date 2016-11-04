<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedInteger('classroom_id');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->integer('first_ca')->default(0);
            $table->integer('second_ca')->default(0);
            $table->integer('exam')->default(0);
            $table->enum('term', ['first', 'second', 'third']);
            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');
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
        Schema::table('results', function(Blueprint $table){
            $table->dropForeign(['student_id']);
            $table->dropForeign(['subject_id']);
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['session_id']);
        });
        Schema::drop('results');
    }
}
